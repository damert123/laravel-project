function formatPhoneNumber() {
    let input = document.getElementById('phone');
    let phoneNumber = input.value.replace(/\D/g, ''); // Удаляем все символы, кроме цифр

    // Добавляем "+7" в начало номера
    if (phoneNumber.substring(0, 1) !== '+') {
        phoneNumber = '+' + phoneNumber;
    }

    let formattedPhoneNumber = '';

    if (phoneNumber.length > 0) {
        formattedPhoneNumber += phoneNumber.substring(0, 2);

        if (phoneNumber.length > 2) {
            formattedPhoneNumber += ' (' + phoneNumber.substring(2, 5);

            if (phoneNumber.length > 5) {
                formattedPhoneNumber += ') ' + phoneNumber.substring(5, 8);

                if (phoneNumber.length > 8) {
                    formattedPhoneNumber += '-' + phoneNumber.substring(8, 10);

                    if (phoneNumber.length > 10) {
                        formattedPhoneNumber += '-' + phoneNumber.substring(10, 12);
                    }
                }
            }
        }
    }

    input.value = formattedPhoneNumber;
}