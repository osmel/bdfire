import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';

//firebase 
import { AngularFireModule } from 'angularfire2'; //  //angularFire se necesita siempre que se use firebase
import { AngularFireDatabaseModule } from 'angularfire2/database'; // solo necesario para las caracteristicas de database 
import { AngularFireAuthModule } from 'angularfire2/auth';  // solo necesario para las caracteristicas de autenticación
import { environment } from '../environments/environment'; //// variable de ambientes



@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
     AngularFireModule.initializeApp(environment.firebase), // importar firebase/app necesario para todo con firebase
    AngularFireDatabaseModule, //Importar firebase/database, solo necesario para las caracteristicas de database 
    AngularFireAuthModule, // Importar firebase/auth,  para las caracteristicas de auth 
  ],    
  
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
