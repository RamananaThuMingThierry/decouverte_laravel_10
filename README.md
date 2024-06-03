   # TP Agence Immo
1. Créer un model Property et la migration
   -> php artisan make:model -m Property
2. Créer un controller 
   -> php artisan make:controller PropertyController -r  
3. Créer un request
   -> php artisan make:request PropertyRequest
4. Voir list des routes
  -> php artisan route:list
5. Démarrer le server en utilisant un api
  -> php artisan serve --host 192.168.*.* --port 8000
6. Package helper
   -> composer require --dev barryvdh/laravel-ide-helper
  -> php artisan ide-helper:models -M  
7. Package qui permet de changer lang 'en' en 'fr'
   -> composer require laravel-lang/common --dev
   -> php artisan lang:add fr
   -> php artisan lang:update
  # Changer quelque paramètre dans le config>app 
    'local' => 'fr'
8. Utiliser tom-select.js.org
   <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <script>
    new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}})
  </script>


  

