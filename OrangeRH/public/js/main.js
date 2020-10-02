$('#chercher').keyup(function () {
    const val = $('#chercher').val()
    var myPattern = new RegExp('(\\w*' + val + '\\w*)', 'gi');

    if (val.length > 2) {

        const fliterNom = Employes.filter((item) => {
            return item.nom.match(myPattern) !== null
        })
        const fliterPrenom = mailer.filter((item) => {
            return item.prenom.match(myPattern) !== null
        })
        const fliterService = mailer.filter((item) => {
            return item.body.match(myPattern) !== null
        })

        const newTable = fliterNom.concat(fliterPrenom).concat(fliterService)
        intMail(newTable);
    } else {

        intMail(mailer);
    }

})