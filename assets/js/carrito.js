class  Carrito{
  constructor(idProducto,cantidad){
    this._idProducto=idProducto;
    this._cantidad = cantidad;
  }
  get idProducto(){
    return this._idProducto;
  }
  set idProducto(idProducto){
    this._idProducto=idProducto;
  }
  get cantidad(){
    return this._cantidad;
  }
  set cantidad(cantidad){
    this._cantidad=cantidad;
  }
}
