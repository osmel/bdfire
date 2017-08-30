  npm install zone.js@0.8.5 --save
  sudo npm install zone.js@0.8.5 --save
  sudo npm install bootstrap@4.0.0-alpha.6 --save
  sudo npm install jquery --save
  sudo npm install tether --save


      "styles": [
        "styles.css",
        "../node_modules/bootstrap/dist/css/bootstrap.min.css"
      ],
      "scripts": [
        "../node_modules/jquery/dist/jquery.slim.min.js",
        "../node_modules/tether/dist/js/tether.min.js",
        "../node_modules/bootstrap/dist/js/bootstrap.min.js"
      ],


      

ng -v

--Las tipificaciones(typings) y el TypeScript.
sudo npm install -g typings
sudo npm install -g typescript


ng new bdfire
cd bdfire


--Instale AngularFire 2 y Firebase
npm install angularfire2 firebase --save

-- 4. Agregue Firebase config a la variable de ambientes(environments) . "/src/environments/environment.ts"

	export const environment = {
	  production: false,
	  firebase: {
	    apiKey: "AIzaSyCS7x_U2ltkvQUTkmLncibIE_ZwcaoNcn8",
	    authDomain: "bdfire-ec89b.firebaseapp.com",
	    databaseURL: "https://bdfire-ec89b.firebaseio.com",
	    projectId: "bdfire-ec89b",
	    storageBucket: "bdfire-ec89b.appspot.com",
	    messagingSenderId: "581888016879"
	  }
	};


			<script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script>
			<script>
			  // Initialize Firebase
			  var config = {
			    apiKey: "AIzaSyCS7x_U2ltkvQUTkmLncibIE_ZwcaoNcn8",
			    authDomain: "bdfire-ec89b.firebaseapp.com",
			    databaseURL: "https://bdfire-ec89b.firebaseio.com",
			    projectId: "bdfire-ec89b",
			    storageBucket: "bdfire-ec89b.appspot.com",
			    messagingSenderId: "581888016879"
			  };
			  firebase.initializeApp(config);
			</script>


--- 
5.  Configurar @NgModule para el AngularFireModule   .. "/src/app/app.module.ts"

import { AngularFireModule } from 'angularfire2';
import { environment } from '../environments/environment';

import { AngularFireDatabaseModule } from 'angularfire2/database';
import { AngularFireAuthModule } from 'angularfire2/auth';


@NgModule({
  imports: [
    AngularFireModule.initializeApp(environment.firebase)   // importar firebase/app necesario para todo con firebase
		    //AngularFireModule.initializeApp(environment.firebase, 'my-app-name')  //Opcionalmente, puede proporcionar un nombre FirebaseApp personalizado con initializeApp.

   	//Agregar módulos de Firebase Database and Auth . Configuración individual de @NgModules
    AngularFireDatabaseModule, //Importar firebase/database, solo necesario para las caracteristicas de database 
    AngularFireAuthModule, // Importar firebase/auth,  para las caracteristicas de auth 
  


  ],
  declarations: [ AppComponent ],
  bootstrap: [ AppComponent ]
})

7. Inyectar AngularFireDatabase      ..   "/src/app/app.component.ts"


import { AngularFireDatabase, FirebaseListObservable } from 'angularfire2/database';

export class AppComponent {
  items: FirebaseListObservable<any[]>;   //declarando variable de tipo "Observable de lista  FirebaseListObservable"
  constructor(db: AngularFireDatabase) {  //inyecta AngularFireDatabase
    this.items = db.list('/items');   //vincular a una lista
  }
}


 "/src/app/app.component.html":
	<ul>
	  <li class="text" *ngFor="let item of items | async">
	    {{item.$value}}
	  </li>
	</ul>


9- ng serve