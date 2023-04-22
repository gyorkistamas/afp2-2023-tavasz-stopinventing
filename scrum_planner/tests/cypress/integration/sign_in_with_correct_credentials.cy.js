describe('sign in testing', () => {
  before(() => {
    cy.refreshDatabase();
    cy.seed();
  });

  it('check if the default admin user can sign in', () => {
    cy.visit('/');
    cy.get('#email').type('adminuser@justacompany.com');
    cy.get('#password').type('password');
    cy.get('.text-center > .btn').click();

    cy.contains('My meetings');
  })

  it('check if the default scrum master user can sign in', () => {
    cy.visit('/');
    cy.get('#email').type('scrummaster@justacompany.com');
    cy.get('#password').type('password');
    cy.get('.text-center > .btn').click();

    cy.contains('My meetings');
  })
})