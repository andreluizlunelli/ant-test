# ant-test
Check if your test class namespace follows the same business class path

### Create autoloader
``` 
phpab -o src/autoload.php -b src composer.json
```

### Build and run Dist
```
php build/generate-phar.php

php dist/ant-test.phar
```

#### Run
```
phpab -o src/autoload.php -b src composer.json \
&& php build/generate-phar.php \
&& php dist/ant-test.phar
```
