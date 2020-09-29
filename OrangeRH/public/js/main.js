$('#chercher').keyup(function() {
    const val = $('#chercher').val()
    var myPattern = new RegExp('(\\w*' + val + '\\w*)', 'gi');
    
    if (val.length > 2) {

        const fliterObject = mailer.filter((item) => { return item.object.match(myPattern) !== null })
        const fliterEmail = mailer.filter((item) => { return item.email.match(myPattern) !== null })
        const fliterBody = mailer.filter((item) => { return item.body.match(myPattern) !== null })

        const newTable = fliterObject.concat(fliterEmail).concat(fliterEmail)
        intMail(newTable);
    }else{

        intMail(mailer);
    }
    
})