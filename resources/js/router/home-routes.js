export const homeRoutes = [
  {
      path: "/",
      component: () => getPage("Home"),
  },
  {
      path: "/test",
      component: () => getPage("Test"),
  },
];

const getPage = (fileName) => import (`@/pages/${fileName}.vue`);
