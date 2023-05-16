describe('Sign up testing', () => {
  before(() => {
    cy.refreshDatabase();
    cy.seed();
  });

  it('Check the registration with correct information and without the profile pic', () => {
    cy.visit('/');
    cy.get(':nth-child(2) > .btn').click();
    cy.get('#fullName').type('Teszt Elek');
    cy.get('#email').type('testedmail@justacompany.com');
    cy.get('#password').type('asdasd123');
    cy.get('#password_confirmation').type('asdasd123');
    cy.get('.text-center > .btn').click();

    //New registration login check

    cy.get('#email').type('testedmail@justacompany.com');
    cy.get('#password').type('asdasd123');
    cy.get('.text-center > .btn').click();

    cy.contains('My meetings');
  });

  it('Check the registration with missing and incorrect information', () => {
    cy.visit('/');
    cy.get(':nth-child(2) > .btn').click();
    //Missing name
    cy.get('#email').type('testedmail@justacompany.com');
    cy.get('#password').type('asdasd123');
    cy.get('#password_confirmation').type('asdasd123');
    cy.get('.text-center > .btn').click();

    cy.get('#email').clear();
    cy.get('#password').clear();
    cy.get('#password_confirmation').clear();

    //Missing Email
    cy.get('#fullName').type('Teszt Elek');
    cy.get('#password').type('asdasd123');
    cy.get('#password_confirmation').type('asdasd123');
    cy.get('.text-center > .btn').click();

    cy.get('#fullName').clear();
    cy.get('#password').clear();
    cy.get('#password_confirmation').clear();

    //Missing password
    cy.get('#fullName').type('Teszt Elek');
    cy.get('#email').type('testedmail@justacompany.com');
    cy.get('.text-center > .btn').click();

    cy.get('#fullName').clear();
    cy.get('#email').clear();

    //Incorrect Email
    cy.get('#fullName').type('Teszt Elek');
    cy.get('#email').type('testedmailydfg');
    cy.get('#password').type('asdasd123');
    cy.get('#password_confirmation').type('asdasd123');
    cy.get('.text-center > .btn').click();

    cy.get('#fullName').clear();
    cy.get('#email').clear();
    cy.get('#password').clear();
    cy.get('#password_confirmation').clear();

    //incorrect password (less than 8 character)
    cy.get('#fullName').type('Teszt Elek');
    cy.get('#email').type('testedmail@justacompany.com');
    cy.get('#password').type('asd');
    cy.get('#password_confirmation').type('asd');
    cy.get('.text-center > .btn').click();

    cy.get('#fullName').clear();
    cy.get('#email').clear();
    cy.get('#password').clear();
    cy.get('#password_confirmation').clear();

    //Not maching passwords
    cy.get('#fullName').type('Teszt Elek');
    cy.get('#email').type('testedmail@justacompany.com');
    cy.get('#password').type('asdasd123');
    cy.get('#password_confirmation').type('asd');
    cy.get('.text-center > .btn').click();

    cy.get('#fullName').clear();
    cy.get('#email').clear();
    cy.get('#password').clear();
    cy.get('#password_confirmation').clear();

    //returning to the sing in page
    cy.get('.mt-3 > .btn').click();
  });
})
