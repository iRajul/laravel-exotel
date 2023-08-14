<?php

use Illuminate\Support\Facades\Http;
use Irajul\Exotel\Facades\Exotel;
use Irajul\Exotel\Tests\TestModels\Booking;

it('can test', function () {
    expect(true)->toBeTrue();
});

it('can connect a call using Exotel', function () {

    $body = '{
        "Call": {
          "Sid": "c5797dcbaaeed7678c4062a4a3ed2f8a",
          "ParentCallSid": null,
          "DateCreated": "2017-03-03 10:48:33",
          "DateUpdated": "2017-03-03 10:48:33",
          "AccountSid": "Exotel",
          "To": "0XXXXX38847",
          "From": "0XXXXX30240",
          "PhoneNumberSid": "0XXXXXX4890",
          "Status": "in-progress",
          "StartTime": "2017-03-03 10:48:33",
          "EndTime": null,
          "Duration": null,
          "Price": null,
          "Direction": "outbound-api",
          "AnsweredBy": null,
          "ForwardedFrom": null,
          "CallerName": null,
          "Uri": "/v1/Accounts/Exotel/Calls.json/c5797dcbaaeed7678c4062a4a3ed2f8a",
          "RecordingUrl": null
        }
      }';
    // Mocking the Http facade
    Http::fake([
        '*' => Http::response($body, 200),
    ]);

    // Create an instance of Exotel

    // Define the test parameters
    $from = '1234567890';
    $to = '9876543210';
    $callerId = '5555555555';

    // Perform the connectCall operation
    $response = Exotel::connectCall($from, $to, $callerId);
    //dd($response);

    // Assert that the response was successful
    expect($response['success'])->toBeTrue();
});

it('can connect a call using Exotel Model', function () {
    $body = '{
        "Call": {
          "Sid": "c5797dcbaaeed7678c4062a4a3ed2f8a",
          "ParentCallSid": null,
          "DateCreated": "2017-03-03 10:48:33",
          "DateUpdated": "2017-03-03 10:48:33",
          "AccountSid": "Exotel",
          "To": "0XXXXX38847",
          "From": "0XXXXX30240",
          "PhoneNumberSid": "0XXXXXX4890",
          "Status": "in-progress",
          "StartTime": "2017-03-03 10:48:33",
          "EndTime": null,
          "Duration": null,
          "Price": null,
          "Direction": "outbound-api",
          "AnsweredBy": null,
          "ForwardedFrom": null,
          "CallerName": null,
          "Uri": "/v1/Accounts/Exotel/Calls.json/c5797dcbaaeed7678c4062a4a3ed2f8a",
          "RecordingUrl": null
        }
      }';
    // Mocking the Http facade
    Http::fake([
        '*' => Http::response($body, 200),
    ]);

    // Define the test parameters
    $from = '1234567890';
    $to = '9876543210';
    $callerId = '5555555555';

    // create a booking entry
    $booking = Booking::create([
    ]);

    $booking->connectCall($from, $to, $callerId, []);
    $booking->connectCall($from, $to, $callerId, []);

    // Assert that the call record was saved
    $this->assertCount(1, Booking::all());

    // count the callRecords of the booking
    $count = Booking::with('callRecords')->first()->callRecords->count();

    expect($count)->toBe(2);
    // Get the saved call record
    $bookingRecord = Booking::with('callRecords')->first();

    $callRecord = $bookingRecord->callRecords->first();
    //dd($callRecord->callRecords->first()->response);
    expect($callRecord->response['success'])->toBeTrue();

    // expect uuid of the call record to be a valid uuid
    expect($callRecord->uuid)->toBeString();
    // Assert the call record data
    expect($callRecord->from)->toBe($from);
    expect($callRecord->to)->toBe($to);
    expect($callRecord->api)->toBe('connectCall');
    expect($callRecord->response['data'])->toBe(json_decode($body, true));
    expect($callRecord->custom_properties)->toBe([]);
});
