<?php

return [
    'users' => [
        'itemTitle' => 'User',
        'collectionTitle' => 'Users',
        'inputs' => [
            'ime' => [
                'label' => 'Ime',
                'placeholder' => 'Ime',
            ],
            'prezime' => [
                'label' => 'Prezime',
                'placeholder' => 'Prezime',
            ],
            'email' => [
                'label' => 'Email',
                'placeholder' => 'Email',
            ],
            'password' => [
                'label' => 'Password',
                'placeholder' => 'Password',
            ],
            'broj_telefona' => [
                'label' => 'Broj telefona',
                'placeholder' => 'Broj telefona',
            ],
            'role' => [
                'label' => 'Role',
                'placeholder' => 'Role',
            ],
        ],
    ],
    'bills' => [
        'itemTitle' => 'Bill',
        'collectionTitle' => 'Bills',
        'inputs' => [
            'usluga_id' => [
                'label' => 'Usluga id',
                'placeholder' => 'Usluga id',
            ],
            'cena' => [
                'label' => 'Cena',
                'placeholder' => 'Cena',
            ],
        ],
    ],
    'services' => [
        'itemTitle' => 'Service',
        'collectionTitle' => 'Services',
        'inputs' => [
            'vozilo_id' => [
                'label' => 'Vozilo id',
                'placeholder' => 'Vozilo id',
            ],
            'zaposleni_id' => [
                'label' => 'Zaposleni id',
                'placeholder' => 'Zaposleni id',
            ],
            'admin_id' => [
                'label' => 'Admin id',
                'placeholder' => 'Admin id',
            ],
            'status_id' => [
                'label' => 'Status id',
                'placeholder' => 'Status id',
            ],
            'naziv' => [
                'label' => 'Naziv',
                'placeholder' => 'Naziv',
            ],
            'opis' => [
                'label' => 'Opis',
                'placeholder' => 'Opis',
            ],
        ],
    ],
    'vehicles' => [
        'itemTitle' => 'Vehicle',
        'collectionTitle' => 'Vehicles',
        'inputs' => [
            'klijent_id' => [
                'label' => 'Klijent id',
                'placeholder' => 'Klijent id',
            ],
            'registarski_broj' => [
                'label' => 'Registarski broj',
                'placeholder' => 'Registarski broj',
            ],
            'marka' => [
                'label' => 'Marka',
                'placeholder' => 'Marka',
            ],
            'model' => [
                'label' => 'Model',
                'placeholder' => 'Model',
            ],
            'godina_proizvodnje' => [
                'label' => 'Godina proizvodnje',
                'placeholder' => 'Godina proizvodnje',
            ],
        ],
    ],
    'statuses' => [
        'itemTitle' => 'Status',
        'collectionTitle' => 'Statuses',
        'inputs' => [
            'naziv' => [
                'label' => 'Naziv',
                'placeholder' => 'Naziv',
            ],
        ],
    ],
];
