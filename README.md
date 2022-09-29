## LARAVEL GOOGLE SMTP DEMO


## Description 
This app is meant to demonstrate how to send email using google smptp server in laravel. Problem statement is that you are to create a system that allows a user to send an email from any account to any recepients. You are to implement this as api in less than an hour. 

### Params

- from
- to 
- subject
- message

### Implementation
1. Create a fresh laravel project 
    1. Add ```POST mail/send ``` endpoint
    2. Create single action EmailController 
    3. Create email form request validating:
        1. from ``` required|email ```
        2. to ``` required|email ```
        3. subject ``` required ```
        4. message ``` required ``` 
    4. Use the email request as default request in EmailController
    5. Create mail ```TestEmail```. Not the best name actually but you get the idea
    6. you can <a href="https://laravel.com/docs/9.x/mail#generating-mailables">read more here</a> about laravel mail to understand how it works
    7. Send the mail like so 
    ```php
    Mail::to($request->only('to'))->send(
        new TestEmail($request->except(['to', 'from']))
    ); 
     ``` 
     8. Make sure your TestEmail has ``` $mail ``` initialize in it constructor and your build method looks like so:
     ```php
    public function build()
    {
        return $this->from($this->mail['from'])->markdown('test');
    }
      ```
     9. setup your google stmp in .env
     ```
    MAIL_HOST="your google workspace smtp host"
    MAIL_PORT=587
    MAIL_USERNAME="your google custom email (example@codesgate.com)"
    MAIL_PASSWORD="example@codesgate.com password"
    MAIL_ENCRYPTION=tls
    MAIL_FROM_NAME="${APP_NAME}"
     ```
     10. ```visit api/mail/send PARAMS from, to, subject, message``` 
     11. And that's all you need


## Installation
1. Clone this repo
2. run ``` composer install ```
3. run ``` cp .env.example .env ```
4. if you are not using valet, start the server using ``` php artisan serve```
5. And you are good
