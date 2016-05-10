# Account Module

## fetch

### in your controller

```php
$this->NoVp()->account()->fetch($accountId);
```

### with container

```php
$account = $container->get('NocVp\Account')
$account->fetch($accountId);
```

## fetchAll

### in your controller

```php
$this->NoVp()->account()->fetchAll();
```

### with container

```php
$account = $container->get('NocVp\Account');
$account->fetchAll();
```

## create

### in your controller

#### with array data
```php
$this->NoVp()->account()->create(array (
    'firstName' => 'john',
    'lastName' => 'doe',
    'email' => 'john.doe@example.com',
));
```

#### with Model
```php
$accountModel = new \NocVp\Model\Request\Account();
$accountModel->setFirstName('john');
$accountModel->setLastName('doe');
$accountModel->setEmail('john.doe@example.com');

$this->NoVp()->account()->create($accountModel);
```

### with container

#### with array data
```php
$account = $container->get('NocVp\Account');
$account->create(array (
    'firstName' => 'john',
    'lastName' => 'doe',
    'email' => 'john.doe@example.com',
));
```

#### with Model
```php
$accountModel = new \NocVp\Model\Request\Account();
$accountModel->setFirstName('john');
$accountModel->setLastName('doe');
$accountModel->setEmail('john.doe@example.com');

$account = $container->get('NocVp\Account');
$account->create($accountModel);
```


## update

### in your controller

#### with array data
```php
$this->NoVp()->account()->update($accountId, array (
    'firstName' => 'john',
    'lastName' => 'doe',
    'email' => 'john.doe@example.com',
));
```

#### with Model
```php
$accountModel = new \NocVp\Model\Request\Account();
$accountModel->setFirstName('john');
$accountModel->setLastName('doe');
$accountModel->setEmail('john.doe@example.com');

$this->NoVp()->account()->update($accountId, $accountModel);
```

### with container

#### with array data
```php
$account = $container->get('NocVp\Account');
$account->update($accountId, array (
    'firstName' => 'john',
    'lastName' => 'doe',
    'email' => 'john.doe@example.com',
));
```

#### with Model
```php
$accountModel = new \NocVp\Model\Request\Account();
$accountModel->setFirstName('john');
$accountModel->setLastName('doe');
$accountModel->setEmail('john.doe@example.com');

$account = $container->get('NocVp\Account');
$account->update($accountId, $accountModel);


## delete

### in your controller

```php
$this->NoVp()->account()->delete($accountId);
```

### with container

```php
$account = $container->get('NocVp\Account')
$account->delete($accountId);
```
