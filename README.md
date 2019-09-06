# Interface deserialization in Symfony 4

Deserialize objects that implement an interface using the JMS Serializer.

```php
$model = $serializer->deserialize($data, Acme\Model\SomeModelInterface::class, 'json');
```






