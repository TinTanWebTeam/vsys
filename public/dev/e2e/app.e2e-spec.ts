import { Ng2BlogPage } from './app.po';

describe('ng2-blog App', function() {
  let page: Ng2BlogPage;

  beforeEach(() => {
    page = new Ng2BlogPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
