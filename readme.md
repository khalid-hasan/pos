<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

# Co Location Inventory Management

Colocation inventory management is a software with 3 major modules.

## No of System Module:
1. Sells Module(will be operate from INDIA)
2. Factory Management (Will be operate from Bangladesh)
3. Accounts Module (Will be operate from Bangladesh)

## Sells Module

## Accounts Module:
1. POS: Number of item sells daily ledger input form. (sells point name, product
description-[product select option], Quantity, rate, customer details, total amount,
customer debit & credit information) – submit via button click & information will be
stored in daily sells table.
2. Report of daily sells (customer name, product name, quantity, rate, total amount,
amount paid, amount left).
3. Status of money transferred from India to Bangladesh (receiver name, amount, date) –
data input type manual by send button & information will be stored in
transferredINtoBD table.
4. Customer account for automatic debit-credit calculation.
5. Customer account will be opened by seller

## Inventory module:
1. Shipment list from Bangladesh with add button. Request will be sending from
Bangladesh and will be stored in shipment table.
2. Add Product to inventory (product Id, product name, quantity) information will be
stored in product table.
3. Product information report (product name, available quantity) will be displayed from
product table.
4. Shipment report (product name, quantity, send date, received date) will be displayed
from shipment table.

## Factory Management:
1. Adding factory (factory name, address, phone no)
2. Raw materials assign to factory (assign date, materials name, quantity, price, production
type)
3. Factory shipment information input by admin user (date wise)
4. List of factory information with working status
Accounts Module:
1. Receiving money from Indian sells point
2. All expense from Bangladesh and cash in hand (balance sheet).

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
