/**
 * Created by omq on 10-14-15.
 */
function checkifempty()
{
    if (!document.form1.condicion.checked)
    {
        document.form1.registrarse.disabled=true;
    }
    else
    {
        document.form1.registrarse.disabled=false;
    }

}
function checkifempty2()
{
    if (!document.form2.condicion2.checked)
    {
        document.form2.registrarse2.disabled=true;
    }
    else
    {
        document.form2.registrarse2.disabled=false;
    }

}
