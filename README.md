# TestTask
PHP Test Task


## Installation

Run commands below
```
composer config repositories.kruzhalin-magento-2-test_task git git@github.com:kruzhalin/test_task.git
```

```
composer require kruzhalin/test_task:dev-master
```

#### Task


We want you to create a module which when an order is fully paid stores the order ID and the paid total sum multiplied by a decimal factor.

* The paid total sum should be multiplied by the decimal factor
* Values and order IDs are logged in a database table
* Admin page to enable and disable the function
* Admin page to set the decimal factor
