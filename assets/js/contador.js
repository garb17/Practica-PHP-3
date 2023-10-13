function contarPalabras(){
    
    let descripcion=document.getElementById("textarea").value;

    if(!descripcion==""){

        let cont=0;

        if(descripcion.includes("\n")){

            let contPal=descripcion.split("\n");

            for(let i=0;i<contPal.length;i++){
                let aux=contPal[i].split(" ");

                for(let j=0;j<aux.length;j++){
                    if(!aux[j]==''){
                        cont++;
                    }
                }  
            }

        }else{

            let contPal=descripcion.split(" ");

            for(let i=0;i<contPal.length;i++){
                if(!contPal[i]==''){
                    cont++;
                }
            }
        }

        let contCar=descripcion.length;

        document.getElementById("cont").innerHTML="Palabras: "+cont+" &nbsp;&nbsp; Caracteres: "+contCar;
    }else{
        document.getElementById("cont").innerHTML="Palabras: 0 &nbsp;&nbsp; Caracteres: 0";
    }


}