describe('Test create new team as admin', () => {
    before(() => {
        cy.refreshDatabase();
        cy.seed();
    });

    Cypress.Commands.add('AccessCreateNewTeam', (email, pw) => {
        cy.visit('/');
        cy.get('#email').type(email);
        cy.get('#password').type(pw);
        cy.get('.text-center > .btn').click();

        cy.get(':nth-child(3) > .btn').click();
        cy.get(':nth-child(3) > .dropdown-menu > :nth-child(2) > .dropdown-item').click();


    });

    it('checks if team creation process runs successfully with correct datas given as admin', () => {
        cy.AccessCreateNewTeam('adminuser@justacompany.com', 'password');

        cy.get('#teamName').type('Cypress Test');

        cy.get('.select2-selection').type('Scrum Master');
        cy.get('span[role="combobox"]').invoke('attr', 'aria-activedescendant').should('contain', 'select2-member-chooser-result');

        cy.get('li[role="option"]').click();

        cy.get('.text-center > .btn-success').click();

        cy.visit('/manage-teams');

        cy.get('.card-title').should('have.text', 'Cypress Test');
    });


    it('checks if team creation process runs successfully with correct datas given as scrum master', () => {
        cy.AccessCreateNewTeam('scrummaster@justacompany.com', 'password');

        cy.get('#teamName').type('Cypress Test #2');

        cy.get('.select2-selection').type('Simple User');
        cy.get('span[role="combobox"]').invoke('attr', 'aria-activedescendant').should('contain', 'select2-member-chooser-result');

        cy.get('li[role="option"]').click();

        cy.get('.text-center > .btn-success').click();

        cy.visit('/manage-teams');

        cy.get('.card-title').should('have.text', 'Cypress Test #2');
    });


})
