https://www.youtube.com/watch?v=3WTQZV5-roY&index=3&list=PLl-K7zZEsYLlP-k-RKFa7RyNPa9_wCH2s

select * from events
where  name="firebase";

1- Selecciona columnas
   select * from events
2- Limita el uso where
  where  name="firebase";   


////////////////////
1- Se crea una referencia al parent KEY (a la tabla)
const db = firebase.database();
const ref = db.child('events');
2- Usa un "pefido de función"
ref.orderFunction().queryFunction();
3- Usar una "función query" para una restriccion avanzada
.queryFunction();

/////////////

//este recupera los 10 primeros registros
//El "pedido de funcion", es pedido por clave
//La "funcion query" es  limitToFirst
ref.orderByKey().limitToFirst(10);

4- "pefido de función"
