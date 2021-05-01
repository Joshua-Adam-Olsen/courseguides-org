'use strict';

const element = React.createElement;

class component extends React.Component {
  constructor(props) {
    super(props);
    this.state = { liked: false };
  }

  render() {
    if (this.state.liked) {
      return 'You liked this.';
    }

    return element(
      'button',
      { onClick: () => this.setState({ liked: true }) },
      'Like'
    );
  }
}

export { element, component };
