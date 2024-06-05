<strong>Mdbhojwani_StorePricing</strong> 

## Table of contents

- [Summary](#summary)
- [Installation](#installation)
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

## License

[Open Software License ("OSL") v. 3.0](https://opensource.org/license/osl-3-0-php)
