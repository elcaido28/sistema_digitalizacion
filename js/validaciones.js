function enable(e){
      key=e.keyCode || e.which;
      teclado=String.fromCharCode(key);//para solo numeros quitar .toLowerCase()
      numero="";
      especial="";
      tecla_especial=false;
      for(var i in especial){
        if(key==especial[i]){
          tecla_especial=true;break;
        }
      }
      if(numero.indexOf(teclado)==-1 && !tecla_especial){
        return false;
      }
}