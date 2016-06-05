<?php
return [
    'POST /v0.4/forms' => [
        'status' => 201,
        'headers' => [],
        'body' => '{
  "id": "BRSgoNH6vdLBZw",
  "title": "My new Typeform",
  "tags": ["first-forms"],
  "webhook_submit_url": "http://example.com/webhook",
  "fields": [
    {
      "id": 3439,
      "type": "short_text",
      "question": "How is the weather down in Barcelona today?"
    }
  ],
  "urls": [
    {
      "id": "hJ4tEqGWXF0qzr",
      "form_id": "BRSgoNH6vdLBZw",
      "version": "v0.4"
    }
  ],
  "_links": [
    {
      "rel": "self",
      "href": "https://api.typeform.io/latest/forms/BRSgoNH6vdLBZw"
    },
    {
      "rel": "url",
      "href": "https://api.typeform.io/latest/urls/hJ4tEqGWXF0qzr"
    },
    {
      "rel": "form_render",
      "href": "https://forms.typeform.io/to/hJ4tEqGWXF0qzr"
    }
  ],
  "version": "v0.4"
}',
    ],

    'GET /v0.4/forms/tb3S10omcrpVDg' => [
        'status' => 200,
        'headers' => [],
        'body' => '{
  "id": "tb3S10omcrpVDg",
  "title": "Hello World",
  "webhook_submit_url": "http://requestb.in/1ao9lh91",
  "fields": [
    {
      "question": "Is it sunny in Barcelona today?",
      "type": "yes_no",
      "id": 900638
    }
  ],
  "urls": [
    {
      "id": "SHLXyTcYuSbjjb",
      "form_id": "tb3S10omcrpVDg",
      "version": "v0.4"
    }
  ],
  "_links": [
    {
      "rel": "self",
      "href": "https://api.typeform.io/latest/forms/tb3S10omcrpVDg"
    },
    {
      "rel": "url",
      "href": "https://api.typeform.io/latest/urls/SHLXyTcYuSbjjb"
    },
    {
      "rel": "form_render",
      "href": "https://forms.typeform.io/to/SHLXyTcYuSbjjb"
    }
  ]
}',
    ],

];