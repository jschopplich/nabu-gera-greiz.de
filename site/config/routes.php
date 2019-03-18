<?php

return [
  [
    'pattern' => 'projekte',
    'action'  => function () {
      return go('projekte/naturschutzinformation-waldhaus');
    }
  ],
  [
    'pattern' => 'amphibienzaun/(:any)',
    'action'  => function ($path) {
      $page = page('projekte/amphibienzaun/' . $path);
      go($page ? $page->url() : 'error');
    }
  ],
  [
    'pattern' => 'informationen',
    'action'  => function () {
      return go('informationen/aktiv-werden');
    }
  ],
  [
    'pattern' => 'impressum',
    'action'  => function () {
      return go('informationen/impressum');
    }
  ],
  [
    'pattern' => 'newsletter-mailer',
    'method' => 'POST',
    'action' => function () {
      $form = new \Uniform\Form([
        'salutation' => [
          'rules' => ['required'],
          'message' => 'Bitte wählen Sie einen Wert aus.'
        ],
        'acadTitle' => [
          'rules' => [],
          'message' => 'Bitte füllen Sie dieses Feld aus.'
        ],
        'forename' => [
          'rules' => ['required'],
          'message' => 'Bitte füllen Sie dieses Feld aus.'
        ],
        'surname' => [
          'rules' => ['required'],
          'message' => 'Bitte füllen Sie dieses Feld aus.'
        ],
        'email' => [
          'rules' => ['required'],
          'message' => 'Bitte füllen Sie dieses Feld aus.'
        ],
        'terms' => [
          'rules' => ['required'],
          'message' => 'Dieses Feld ist erforderlich.'
        ]
      ]);
    
      // Perform validation and execute guards
      $form->withoutFlashing()
           ->withoutRedirect()
           ->guard();

      if (!$form->success()) {
        // Return validation errors
        return Response::json($form->errors(), 400);
      }

      // If validation and guards passed, execute the action
      $form->emailAction([
        'from' => $form->data('email'),
        'to' => '',
        'subject' => 'Eintragen',
        'template' => 'newsletter',
        'data' => [
          'salutation' => $form->data('salutation'),
          'acadTitle' => $form->data('acadTitle'),
          'forename' => $form->data('forename'),
          'surname' => $form->data('surname'),
          'email' => $form->data('email')
        ]
      ]);
  
      if (!$form->success()) {
        // This should not happen and is our fault
        return Response::json($form->errors(), 500);
      }

      // Return code 200 on success
      return Response::json([], 200);
    }
  ]
];
