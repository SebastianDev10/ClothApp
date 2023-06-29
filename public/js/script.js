class FormValidator {
    constructor(form) {
      this.form = form;
      this.emailInput = form.querySelector('input[name="email"]');
      this.confirmedPasswordInput = form.querySelector('input[name="confirmedPassword"]');
    }
  
    init() {
      this.emailInput.addEventListener('keyup', this.validateEmail.bind(this));
      this.confirmedPasswordInput.addEventListener('keyup', this.validatePassword.bind(this));
    }
  
    isEmail(email) {
      return /\S+@\S+\.\S+/.test(email);
    }
  
    arePasswordsSame(password, confirmedPassword) {
      return password === confirmedPassword;
    }
  
    markValidation(element, condition) {
      !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
    }
  
    validateEmail() {
      setTimeout(() => {
        this.markValidation(this.emailInput, this.isEmail(this.emailInput.value));
      }, 1000);
    }
  
    validatePassword() {
      setTimeout(() => {
        const condition = this.arePasswordsSame(
          this.confirmedPasswordInput.previousElementSibling.value,
          this.confirmedPasswordInput.value
        );
        this.markValidation(this.confirmedPasswordInput, condition);
      }, 1000);
    }
  }
  
  const form = document.querySelector("form");
  
  const formValidator = new FormValidator(form);
  formValidator.init();
  
