
function formatarCNPJ(cnpj) {
    cnpj = cnpj.replace(/\D/g, "");
    if (cnpj.length > 14) {
        cnpj = cnpj.slice(0, 14);
    }
    cnpj = cnpj.replace(/^(\d{2})(\d)/, "$1.$2");
    cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3");
    cnpj = cnpj.replace(/\.(\d{3})(\d)/, ".$1/$2");
    cnpj = cnpj.replace(/(\d{4})(\d)/, "$1-$2");
    return cnpj;
}

function formatarTelefone(telefone) {
    telefone = telefone.replace(/\D/g, "");
    if (telefone.length > 11) {
        telefone = telefone.slice(0, 11);
    }
    telefone = telefone.replace(/^(\d{2})(\d)/, "($1) $2");
    telefone = telefone.replace(/(\d{4,5})(\d)/, "$1-$2");
    return telefone;
}

function formatarCEP(cep) {
    cep = cep.replace(/\D/g, "");
    if (cep.length > 8) {
        cep = cep.slice(0, 8);
    }
    cep = cep.replace(/^(\d{5})(\d)/, "$1-$2");
    return cep;
}

function formatarCPF(cpf) {
    cpf = cpf.replace(/\D/g, "");
    if (cpf.length > 11) {
        cpf = cpf.slice(0, 11);
    }
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
    return cpf;
}
