<strong>Mdbhojwani_StorePricing</strong> 

## Table of contents

- [Summary](#summary)
- [Installation](#installation)
- [Configurations](#configurations)
- [License](#license)

## Summary

Module use to allow to set the catalog product prices for specific store and sale catalog items in different prices for each stores.

## Installation

```
composer require mdbhojwani/magento2-store-view-pricing
bin/magento module:enable Mdbhojwani_StorePricing
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy -f
bin/magento cache:clean
bin/magento cache:flush
```

## Configurations

```
1. Login to Magento Backend
2. Navigate to Store > Configurations > Mdbhojwani > Store View Pricing
3. Enable the Module and Catalog Price Scope to 'Store View'
```
- Module Configuration
![Module Configuration Screen](media/slide-1.png)
<br />
- Catalog Price Scope Configuration
![Catalog Price Scope Configuration Screen](media/slide-2.png)
<br />
- Update Catalog Product Price on Store View
![Catalog Product Price Update on Store View Screen](media/slide-3.png)


## License

[Open Software License ("OSL") v. 3.0](https://opensource.org/license/osl-3-0-php)
