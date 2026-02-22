import app from 'flarum/forum/app';
import Page from 'flarum/common/components/Page';
import m from 'mithril';

export default class ContentPage extends Page {

  view() {
    return m(".ContentPage", [
      m("div.container", [
        m("h2", "Loading...")
      ])
    ]);
  }

}

app.routes['content-page'] = {
  path: '/:slug',
  component: ContentPage
};
