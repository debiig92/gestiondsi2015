/**
 * Created by omq on 09-19-15.
 */
function selectdivOnChange(sel) {
    if (sel.value=="nada"){
        $("#lista").hide();
        $("#cuadros").hide();

    }else{
      if (sel.value=="listaAlumno"){
        $("#lista").show();
        $("#cuadros").hide();
      }
      else{
          $("#lista").hide();
          $("#cuadros").show();
      }
    }
}