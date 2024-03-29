import { createWebHistory, createRouter } from "vue-router";
import Standing from "../views/Standing.vue";
import TeamShow from "../views/TeamShow.vue";
import History from "../views/History.vue";
import Cup from "../views/Cup.vue";
import Fixtures from "../views/Fixtures.vue";
import Results from "../views/Results.vue";
import AllMatches from "../views/AllMAtches.vue";
import EditFixtures from "../views/EditFixtures.vue";

const routes = [
  {
    path: "/trinitti-rancco/home",
    name: "standing",
    component: Standing,
  },
  {
    path: "/trinitti-rancco/history",
    name: "history",
    component: History,
  },
  {
    path: "/trinitti-rancco/team/:slug",
    name: "team",
    component: TeamShow,
  },
  {
    path: "/trinitti-rancco/cup",
    name: "cup",
    component: Cup,
  },
  {
    path: "/trinitti-rancco/fixtures",
    name: "fixtures",
    component: Fixtures,
  },
  {
    path: "/trinitti-rancco/results",
    name: "results",
    component: Results,
  },
  {
    path: "/trinitti-rancco/matches",
    name: "matches",
    component: AllMatches,
  },
  {
    path: "/trinitti-rancco/fixtures/edit",
    name: "fixtures-edit",
    component: EditFixtures,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;