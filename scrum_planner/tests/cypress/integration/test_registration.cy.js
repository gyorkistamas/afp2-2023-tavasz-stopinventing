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
  })
})
