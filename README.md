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

  php artisan make:mail PropertyContactMail --markdown=emails.property.contact

  # Installer mailhog
  https://github.com/mailhog/MailHog/releases
  MailHog_windows_amd64.exe
  http://localhost:8025/
  php artisan config:cache
  Il faut démarrer le server avant de l'utiliser
  
  # Utiliser softDeletes
  pour que la suppression restent dans la corbeille avant d'être supprimer définitivements

   * N'oublie pas de mettre "use SoftDeletes" dans le model.
  
   # Property::recent()->withTrashed()->paginate(5)
     * withTrashed() : permet de récupér tous les property y compris cel qui a été supprimer.


  # Dans la méthode destroy
   $property->delete() : Il y vas dans la corbeille
   $property->forceDelete() : Il sera supprimer définitivement
   $property->restore() : Permet de le restore    
   php artisan make:migrateion AddDeteletedAtProperties
 
   # Utilisations de cast dans le model
      


