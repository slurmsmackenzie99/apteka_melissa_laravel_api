## apteka-melissa.pl - zadanie rekrutacyjne
### Stworzone API, które odbiera, modyfikuje i wysyła request

Funkcjonalność zaimplenentowana tutaj:
> Http/Controllers/Api/PaymentController.php
```php
    /**
     * Manipulate and redirect the request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //wysłany request
        $received = $request->all();

        // modyfikacja danych
        $postRequest = array(
            "payed" => $received["payed"],
            "orderNo" => $received["orderNo"],
            "yourName" => $received["yourName"]
        );
        
        // indentyfikacja sklepu
        $shop_type = $received["shop"]["id"];

        //zwróć odpowiedź (response) po wysłaniu requesta na podany endpoint
        return $response = Http::withHeaders([
            'api-id' => 'rekrutacja',
            'api-key' => 'AAV$BM%FIH^SAX#2CK8JU47QU$3L$J!3Q&9BVYIJWAND#W3'
        ])->post('https://www.apteka-melissa.pl/rekrutacja/sklep/' . $shop_type, $postRequest);
    }
```

Poprawne zbudowanie scieżki
> routes/api.php
```php
Route::apiResource('payment', PaymentController::class);
```