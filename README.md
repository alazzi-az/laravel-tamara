

# Laravel wrapper for [Tamara SDK](https://github.com/tamara-solution/php-sdk)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alazzi-az/laravel-tamara.svg?style=flat-square)](https://packagist.org/packages/alazzi-az/laravel-tamara)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/alazzi-az/laravel-tamara/run-tests?label=tests)](https://github.com/alazzi-az/laravel-tamara/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/alazzi-az/laravel-tamara/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/alazzi-az/laravel-tamara/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/alazzi-az/laravel-tamara.svg?style=flat-square)](https://packagist.org/packages/alazzi-az/laravel-tamara)

Laravel wrapper for Tamara SDK with small amount of changes to make it work with Laravel 9.x.




## Installation

You can install the package via composer:

```bash
composer require alazzi-az/laravel-tamara
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-tamara-config"
```

This is the contents of the published config file:

```php
return [
    'uri' => env('TAMARA_URI', 'https://api-sandbox.tamara.co'),
    'token' => env('TAMARA_TOKEN', ''),
    'notification_token' => env('TAMARA_NOTIFICATION_TOKEN', ''),
    'request_timeout' => env('TAMARA_REQUEST_TIMEOUT', 1000),
    'transport' => null,
    'success_url' =>  env('APP_URL').'/tamara_handle_success_redirect',
    'failure_url' =>  env('APP_URL').'/tamara_handle_failure_redirect',
    'cancel_url' =>  env('APP_URL').'/tamara_handle_cancel_redirect',
    'notification_url' =>  env('APP_URL').'/tamara_notification_redirect',
];
```


## Usage For Client Instance

```php
use \AlazziAz\Tamara\Facades\Tamara;

$client = \AlazziAz\Tamara\Facades\Tamara::client();
$response = $client->getPaymentTypes('SA');
```
## Create Order Checkout

```php
use \AlazziAz\Tamara\Facades\Tamara;
use \AlazziAz\Tamara\Tamara\Model\Order\MerchantUrl;
use \AlazziAz\Tamara\Tamara\Model\Order\OrderItemCollection;
use \AlazziAz\Tamara\Tamara\Model\Order\Order;
use \AlazziAz\Tamara\Tamara\Model\Order\OrderItem;
use AlazziAz\Tamara\Tamara\Request\Checkout\CreateCheckoutRequest;
use \AlazziAz\Tamara\Tamara\Model\Order\Consumer;
use AlazziAz\Tamara\Tamara\Model\Money;
use AlazziAz\Tamara\Tamara\Model\Order\Address;

$merchantUrl = app()->make(MerchantUrl::class);
$order = new Order();
$order->setMerchantUrl($merchantUrl);
$orderItemCollection = new OrderItemCollection();
$client = Tamara::client();

// firs set  Order Details
$order->setOrderReferenceId($orderReferenceId);
$order->setLocale($local);
$order->setCurrency($orderCurrency);
$order->setTotalAmount(new Money($totalAmount, $orderCurrency));
$order->setCountryCode($countryCode);
$order->setPaymentType($paymentType);
$order->setDescription($orderDescription);
$order->setTaxAmount(new Money($taxAmount, $orderCurrency));
$order->setDiscount(new Discount($discountType, new Money($discountAmount, $orderCurrency)));
$order->setShippingAmount(new Money($shippingAmount, $orderCurrency));


// second set Consumer data
$consumer = new Consumer();
$consumer->setFirstName($firstName);
$consumer->setLastName($lastName);
$consumer->setEmail($email);
$consumer->setPhoneNumber($phoneNumber);
$order->setConsumer($consumer);

// third sett Billing Address
$address = new Address();
$address->setFirstName($firstName);
$address->setLastName($lastName);
$address->setLine1($line1);
$address->setLine2($line2);
$address->setRegion($region);
$address->setCity($city);
$address->setPhoneNumber($phoneNumber);
$address->setCountryCode($countryCode);
$order->setBillingAddress($address);

// forth set Shipping Address
$address = new Address();
$address->setFirstName($firstName);
$address->setLastName($lastName);
$address->setLine1($line1);
$address->setLine2($line2);
$address->setRegion($region);
$address->setCity($city);
$address->setPhoneNumber($phoneNumber);
$address->setCountryCode($countryCode);
$order->setShippingAddress($address);

// fifth we add items to items collection
$orderItem = new OrderItem();
$orderItem->setName($name);
$orderItem->setQuantity($quantity);
$orderItem->setUnitPrice(new Money($unitPrice, $currency));
$orderItem->setType($type);
$orderItem->setTotalAmount(new Money($totalPrice, $currency));
$orderItem->setTaxAmount(new Money($taxAmount, $currency));
$orderItem->setDiscountAmount(new Money($discount, $currency));
$orderItem->setReferenceId($uniqueId);
$orderItem->setSku($uniqueId);
if ($imageUrl) {
    $orderItem->setImageUrl($imageUrl);
}

// append items can be in iterator 
$orderItemCollection->append($orderItem);

// sixth set items collection to order 
$order->setItems($this->orderItemCollection);

// seventh  create request object
$request = new CreateCheckoutRequest($this->order);

// now we can make request 

$response = $client->createCheckout($request);

// get data from response 
$checkoutUrl=$response->getCheckoutResponse()->getCheckoutUrl(); // redirect customer to complete payment
$orderID=$response->getCheckoutResponse()->getOrderId();
$heckOutID=$response->getCheckoutResponse()->getCheckoutId();

```
## After Customer complete payment we need to Authorise Order Transaction
### in controller that handle success_url endpoint
```php
use AlazziAz\Tamara\Tamara\Request\Order\AuthoriseOrderRequest;
use AlazziAz\Tamara\Facades\Tamara;

  $authOrder = new AuthoriseOrderRequest($request->get('orderId'));
  $authedResponse = Tamara::client()->authoriseOrder($authOrder);
  $orderStatus=$authedResponse->getOrderStatus(); // authorised, approved, captured, fully_captured, declined, refunded, failed, expired
// then check the status of the order and update your app state

```
#### you can Capture payment by using AlazziAz\Tamara\Tamara\Request\Payment\CaptureRequest

## Usage For Notification Service Instance

```php
use AlazziAz\Tamara\Facades\Tamara;

$notificationService = Tamara::notificationService();
$message = $notificationService->processAuthoriseNotification();
// then you can update state of the app e.g.
$orderId=$message->getOrderReferenceId();
$orderStatus=$message->getOrderStatus();
//...
```
## Usage Some  Instance by Laravel Container to get the instance injected config values

```php
use Illuminate\Support\Facades\App;
use AlazziAz\Tamara\Tamara\Model\Order\MerchantUrl;

$merchantUrl = App::make(MerchantUrl::class); // app()->make(MerchantUrl::class);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/alazzi-az/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Mohammed Ali Azman](https://github.com/alazzi-az)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
