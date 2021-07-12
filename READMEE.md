
                                                After downloading the project follow next steps to make it run :
                                                Open Bash terminal :-
                                                1-Wrtie "composer install " and hit enter
                                                2-Wrtie "npm install" and hit enter                 
                                                3-Wrtie "npm run dev" and hit enter   
                                                4-Make copy of env.example into .env and customize it with your database name 
                                                5-Wrtie "php artisan key:generate" and hit enter  
                                                6-Wrtie "php artisan migrate" and hit enter to get all tables in your database
                                                
                                                
                                            {If you got this ERRoR(Syntax error or access violation: 1071 Specified key was too long) when you try to migrate :
                                            
                                            -- go to App \ Providers\AppServiceProvider.php
                                            
                                            use Illuminate\Support\ServiceProvider;
                                            use Illuminate\Support\Facades\Schema;       <<<<< add this in the same position
                                            
                                            
                                            
                                            public function boot()
                                                       {
                                                          Schema::defaultStringLength(191);   <<< and wrtie this line in this function
                                                       }
                                                     }
                                                     
                                             Then run the mograte command again "php artisan migrate:fresh"
                                             
                                             
                                          ___________________________________________________________________________________________________________________________


                           - Only loged in user can do CRUD operation on Posts ( if not logged in you will not be able to add any posts) . 
                           - To add comment on a specific post you need to be logged in ( after you login you can click on Home from dashboard to redirect to website) .
                           - Used JetStream (from laravel) for the login and register of user .


                                            
                                                
                                                
