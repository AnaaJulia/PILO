function mascara_telefone(obj) {
    
    if (obj.value.length == 0) {
        obj.value += "("
    }
    if (obj.value.length == 3) {
        obj.value += ")"
    }
    if (obj.value.length == 9) {
        obj.value += "-"
    }

}
function masc_cnpj(obj2) {
    if (obj2.value.length == 2) {
        obj2.value += "."
    }
    if (obj2.value.length == 6){
        obj2.value += "."
    }
    if (obj2.value.length == 10) {
        obj2.value += "/"
    }
    if (obj2.value.length == 15) {
        obj2.value += "-"
    }
}
function masc_cep(obj3) {
    
    if (obj3.value.length == 5) {
        obj3.value += "-"
    }

}