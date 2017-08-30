import { Component } from '@angular/core';
import { AngularFireDatabase, FirebaseListObservable, FirebaseObjectObservable } from 'angularfire2/database';  

@Component({
  selector: 'app-root',
  //templateUrl: './app.component.html',
   template: `
  			<h1>{{ (item | async) }}</h1>
  			<h1>{{ (item | async)?.nombre }}</h1>

			<ul>
			  <li class="text" *ngFor="let item of items | async">
			    {{item.$value}}
			  </li>
			</ul>  			
  `,
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'app';

	   items: FirebaseListObservable<any[]>;   //declarando variable de tipo "Observable de lista  FirebaseListObservable"
	    item: FirebaseObjectObservable<any>;

	  constructor(db: AngularFireDatabase) {  //inyecta AngularFireDatabase
	    this.items = db.list('/items');   //vincular a una lista
	    this.item = db.object('/items');


		this.item = db.object('/items', { preserveSnapshot: true });
		this.item.subscribe(snapshot => {
		  console.log(snapshot);
		  console.log(snapshot.key);
		  console.log(snapshot.val());
		});

	  }

}
