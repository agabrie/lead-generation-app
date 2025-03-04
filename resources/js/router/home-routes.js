export const homeRoutes = [
  {
      path: "/",
      children:[
        {
          path:"",
          component: () => getPage("Home"),
        },
        {
          path: "test",
          component: () => getPage("Test"),
        },
      ]
  },
 
];

const getPage = (fileName) => import (`@/pages/${fileName}.vue`);
