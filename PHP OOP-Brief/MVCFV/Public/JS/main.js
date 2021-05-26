var app = new Vue({
    el: '#modal',
    data: {
        firstNameErr: '',
        lastNameErr: '',
        firstName: '',
        lastName: '',
        showAddModal: false,
    },
    methods: {
        validationForm: function (e) {

            this.firstNameErr = '' // Emty Errors To Start Fresh
            this.lastNameErr = '' // Emty Errors To Start Fresh


            if (!this.firstName) {
                this.firstNameErr = 'First Name Empty'
            }
            if (this.firstName && this.firstName.length < 3) {
                this.firstNameErr = 'First Name Can\'t Be Less than 3 Caracter'
            }

            if (!this.lastName) {
                this.lastNameErr = 'Last Name Empty'
            }
            if (this.lastName && this.lastName.length < 3) {
                this.lastNameErr = 'Last Name Can\' Be Less than 3 Caracter'
            }


            if (!this.lastNameErr.length && !this.firstNameErr.length) {
                return true
            }
            e.preventDefault()
        }
    }
})

var app = new Vue({
    el: '#login',
    data: {
        userNamee: '',
        password: '',
        userNameeErr: '',
        passwordErr: '',
        fieldType: 'password',
        passwordv: false,
    },
    methods: {
        showPassword: function () {
            this.fieldType = this.fieldType === 'password' ? 'text' : 'password'
        },
        // validationForm: function (e) {

        //     this.userNameeErr = '' // Emty Errors To Start Fresh
        //     this.passwordErr = '' // Emty Errors To Start Fresh


        //     if (!this.userNamee) {
        //         this.userNameeErr = 'User Name Empty'
        //     }
        //     if (this.userNamee && this.userNamee.length < 3) {
        //         this.userNameeErr = 'User Name Can\'t Be Less than 3 Caracter'
        //     }

        //     if (!this.password) {
        //         this.passwordErr = ('password Empty')
        //     }
        //     if (this.password && this.password.length < 8) {
        //         this.passwordErr = 'password Can\' Be Less than 8 Caracter'
        //     }


        //     if (!this.userNamee.length && !this.passwordErr.length) {
        //         return true
        //     }
        //     e.preventDefault()
        // },
        userNameevalidation: function (e) {

            this.userNameeErr = '' // Emty Errors To Start Fresh


            if (!this.userNamee) {
                this.userNameeErr = 'User Name Empty'
            }
            if (this.userNamee && this.userNamee.length < 3) {
                this.userNameeErr = 'User Name Can\'t Be Less than 3 Caracter'
            }

            if (!this.userNamee.length) {
                return true
            }
            e.preventDefault()
        },
        passwordvalidation: function (e) {

            this.passwordErr = '' // Emty Errors To Start Fresh


            if (!this.password) {
                this.passwordErr = ('password Empty')
            }
            if (this.password && this.password.length < 8) {
                this.passwordErr = 'password Can\' Be Less than 8 Caracter'
            }


            if (!this.passwordErr.length) {
                return true
            }
            e.preventDefault()
        }
    }
})
$('.counter').each(function() {
  var $this = $(this),
      countTo = $this.attr('data-count');
  
  $({ countNum: $this.text()}).animate({
    countNum: countTo
  },

  {

    duration: 8000,
    easing:'linear',
    step: function() {
      $this.text(Math.floor(this.countNum));
    },
    complete: function() {
      $this.text(this.countNum);
      //alert('finished');
    }

  });  
  
  

});
