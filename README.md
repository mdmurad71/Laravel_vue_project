
# Hotel Reserve Admin site

1. install a laravel project with command
composer create-project laravel/laravel app "8.*".

2. Install Vue 3
   npm install --save vue@next && npm install --save-dev vue-loader@next

3. Open webpack.mix.js and add .vue() the method as I added in the below code:
```bash
  
  const mix = require('laravel-mix');
   mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
   
```

4. Open resources/js/app.js and update the following code into that file:

```bash

require('./bootstrap');




import { createApp } from 'vue';
import router from './routes';

import User from './Helper/User';
window.User = User



const app = createApp({})

app.use(router)

app.mount('#app')
```
5. make a file route.js
 all component import there

 6. run the command
 ```bash
 npm i vue-router@next
 ```
 7. go to resource/views/welcome.blade.php and set there
 ```bash
         <div id="app">
            
                <router-view/>
            </div>

            <script src="{{ mix('js/app.js') }}"></script>
 ```

8. Run the command
```bash
npm run watch
```
 9. All code in folder

 ```bash
Laravel_vue_project\blog
 ```

 10. run the project 

 ```bash
php artisan serve
 ```

 # Hotel reserve Client site

1. #### all prosedure are are same

2. all code in folder
 ```bash
Laravel_vue_project\blog
 ```

 3. run the project different project
 ```bash
php artisan serve --port=4000
 ```

## Acknowledgements

 - [Awesome Readme Templates](https://awesomeopensource.com/project/elangosundar/awesome-README-templates)
 - [Awesome README](https://github.com/matiassingers/awesome-readme)
 - [How to write a Good readme](https://bulldogjob.com/news/449-how-to-write-a-good-readme-for-your-github-project)

