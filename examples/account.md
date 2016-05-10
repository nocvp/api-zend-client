# Account Module

## FETCH

### In Your Controller

```php
$this->NoVp()->account()->fetch($accountId);
```

### With Interop\Container\ContainerInterface

```php
$account = $container->get('NocVp\Account')
$account->fetch($accountId);
```

## FETCH ALL

### In Your Controller

```php
$this->NoVp()->account()->fetchAll();
```

### With Interop\Container\ContainerInterface

```php
$account = $container->get('NocVp\Account');
$account->fetchAll();
```

## CREATE

### In Your Controller

#### Array Based Request
```php
$this->NoVp()->account()->create(array (
    'firstName' => 'john',
    'lastName' => 'doe',
    'email' => 'john.doe@example.com',
));
```

#### Model Based Request
```php
$accountModel = new \NocVp\Model\Request\Account();
$accountModel->setFirstName('john');
$accountModel->setLastName('doe');
$accountModel->setEmail('john.doe@example.com');

$this->NoVp()->account()->create($accountModel);
```

### With Interop\Container\ContainerInterface

#### Array Based Request
```php
$account = $container->get('NocVp\Account');
$account->create(array (
    'firstName' => 'john',
    'lastName' => 'doe',
    'email' => 'john.doe@example.com',
));
```

#### Model Based Request
```php
$accountModel = new \NocVp\Model\Request\Account();
$accountModel->setFirstName('john');
$accountModel->setLastName('doe');
$accountModel->setEmail('john.doe@example.com');

$account = $container->get('NocVp\Account');
$account->create($accountModel);
```

## UPDATE

### In Your Controller

#### Array Based Request
```php
$this->NoVp()->account()->update($accountId, array (
    'firstName' => 'john',
    'lastName' => 'doe',
    'email' => 'john.doe@example.com',
));
```

#### Model Based Request
```php
$accountModel = new \NocVp\Model\Request\Account();
$accountModel->setFirstName('john');
$accountModel->setLastName('doe');
$accountModel->setEmail('john.doe@example.com');

$this->NoVp()->account()->update($accountId, $accountModel);
```

### With Interop\Container\ContainerInterface

#### Array Based Request
```php
$account = $container->get('NocVp\Account');
$account->update($accountId, array (
    'firstName' => 'john',
    'lastName' => 'doe',
    'email' => 'john.doe@example.com',
));
```

#### Model Based Request
```php
$accountModel = new \NocVp\Model\Request\Account();
$accountModel->setFirstName('john');
$accountModel->setLastName('doe');
$accountModel->setEmail('john.doe@example.com');

$account = $container->get('NocVp\Account');
$account->update($accountId, $accountModel);


## DELETE

### In Your Controller

```php
$this->NoVp()->account()->delete($accountId);
```

### With Interop\Container\ContainerInterface

```php
$account = $container->get('NocVp\Account')
$account->delete($accountId);
```
