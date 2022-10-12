import IMask from "imask";

export default {
    email(input) {
        IMask(input, {
            mask: /^\S*@?\S*$/,
        });
    },
    telefone(input) {
        IMask(input, {
            mask: [
                {
                    mask: "(00) 0000-0000",
                },
                {
                    mask: "(00) 00000-0000",
                },
            ],
        });
    },
    cpf(input) {
        IMask(input, {
            mask: "000.000.000-00",
        });
    },
    cep(input) {
        IMask(input, {
            mask: "00000-000",
        });
    },
};
