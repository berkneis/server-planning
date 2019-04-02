## Information

- My first project with symfony. :)

## Dependencies

- PHP >= 7.1.3
- Symfony ~4.0

    

## How to install

You must run this command

    composer require berkneis/server-planning
    
## How to use in controller

    $calculator = new Calculator();
            $response = $calculator->calculate(new Server(new Resources(2, 32, 100)), [
                new Resources(1, 16, 10),
                new Resources(1, 16, 10),
                new Resources(2, 32, 100)
            ]);
    
    return new Response($response);
    
    //Response must be return 2
    
## How to run unit test manually?

    phpunit --bootstrap vendor/autoload.php -c vendor/berkneis/server-planning
    
Thank you!