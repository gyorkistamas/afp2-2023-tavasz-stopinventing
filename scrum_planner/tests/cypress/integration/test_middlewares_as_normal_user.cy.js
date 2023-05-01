describe('middleware test for normal user', () => {
    before(() => {
        cy.refreshDatabase();
        cy.seed();

    });

    beforeEach(() => {
        cy.login({email:'justauser@justacompany.com'});
    });

    it('visits the sign in page', () => {
        cy.visit('/sign-in', {failOnStatusCode: false});
        cy.contains('404')
    });

    it('visits the sign up page', () => {
        cy.visit('/sign-up', {failOnStatusCode: false});
        cy.contains('404')
    });

    it('visits the forgotten password page', () => {
        cy.visit('/request-password', {failOnStatusCode: false});
        cy.contains('404')
    });

    it('visits the users page', () => {
        cy.visit('/users', {failOnStatusCode: false});
        cy.contains('401')
    });

    it('visits the status change page', () => {
        cy.visit('/users/change-status/1', {failOnStatusCode: false});
        cy.contains('401')
    });

    it('visits the team creation page', () => {
        cy.visit('/team/create', {failOnStatusCode: false});
        cy.contains('401')
    });

    it('visits the manage teams page', () => {
        cy.visit('/manage-teams', {failOnStatusCode: false});
        cy.contains('401')
    });

    it('visits the edit team page', () => {
        cy.visit('/team/edit/1', {failOnStatusCode: false});
        cy.contains('404')
    });

    it('visits the delete team page', () => {
        cy.visit('/team/delete/1', {failOnStatusCode: false});
        cy.contains('404')
    });

    it('visits the edit profile page', () => {
        cy.visit('/edit-profile', {failOnStatusCode: false});
        cy.contains('Edit Profile')
    });

    it('visits the meeting creation page', () => {
        cy.visit('/meeting/create', {failOnStatusCode: false});
        cy.contains('401')
    });

    it('visits the meeting edit page', () => {
        cy.visit('/meeting/edit/1', {failOnStatusCode: false});
        cy.contains('404')
    });

    it('visits the meeting delete page', () => {
        cy.visit('/meeting/delete/1', {failOnStatusCode: false});
        cy.contains('404')
    });

    it('visits a show meeting page', () => {
        cy.visit('/meeting/show/1', {failOnStatusCode: false});
        cy.contains('404')
    });

    it('visits the my meetings page', () => {
        cy.visit('/my-meetings');
        cy.contains('Next week')
    });

    it('visits the my invites page', () => {
        cy.visit('/my-invites');
        cy.contains('Back to my meetings')
    });

    it('visits the manage meetings page', () => {
        cy.visit('/manage-meetings', {failOnStatusCode: false});
        cy.contains('401')
    });

    it('visits the sign out page', () => {
        cy.visit('/sign-out');
        cy.contains('Sign In')
    });
})
