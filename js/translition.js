barba.init({
    transitions: [
      {
        name: 'home',
        sync: true,
        to: { namespace: ['clip'] },
        once() {},
        leave() {},
        enter() {},
      },    ],
  });