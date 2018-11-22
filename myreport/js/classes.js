var classes = [
    {
        "name": "AppBundle\\AppBundle",
        "interface": false,
        "abstract": false,
        "methods": [],
        "nbMethodsIncludingGettersSetters": 0,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [
            "Symfony\\Component\\HttpKernel\\Bundle\\Bundle"
        ],
        "parents": [
            "Symfony\\Component\\HttpKernel\\Bundle\\Bundle"
        ],
        "lcom": 0,
        "length": 0,
        "vocabulary": 0,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 0,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 0,
        "number_operators_unique": 0,
        "number_operands_unique": 0,
        "cloc": 0,
        "loc": 4,
        "lloc": 4,
        "mi": 171,
        "mIwoC": 171,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 0,
        "relativeSystemComplexity": 0,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 0,
        "totalSystemComplexity": 0,
        "package": "AppBundle\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Controller\\DefaultController",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "indexAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller",
            "AppBundle\\Controller\\Interfaces\\DefaultControllerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller"
        ],
        "lcom": 1,
        "length": 3,
        "vocabulary": 3,
        "volume": 4.75,
        "difficulty": 0.5,
        "effort": 2.38,
        "level": 2,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 9.51,
        "number_operators": 1,
        "number_operands": 2,
        "number_operators_unique": 1,
        "number_operands_unique": 2,
        "cloc": 8,
        "loc": 16,
        "lloc": 8,
        "mi": 119.88,
        "mIwoC": 75.43,
        "commentWeight": 44.46,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "AppBundle\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Controller\\SecurityController",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "loginAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller",
            "AppBundle\\Controller\\Interfaces\\SecurityControllerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller"
        ],
        "lcom": 1,
        "length": 18,
        "vocabulary": 10,
        "volume": 59.79,
        "difficulty": 1.75,
        "effort": 104.64,
        "level": 0.57,
        "bugs": 0.02,
        "time": 6,
        "intelligentContent": 34.17,
        "number_operators": 4,
        "number_operands": 14,
        "number_operators_unique": 2,
        "number_operands_unique": 8,
        "cloc": 8,
        "loc": 19,
        "lloc": 11,
        "mi": 106.92,
        "mIwoC": 64.71,
        "commentWeight": 42.21,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.4,
        "relativeSystemComplexity": 16.4,
        "totalStructuralComplexity": 16,
        "totalDataComplexity": 0.4,
        "totalSystemComplexity": 16.4,
        "package": "AppBundle\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Controller\\TaskController",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "listAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "toggleTaskAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deleteTaskAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 7,
        "ccn": 3,
        "ccnMethodMax": 2,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Form\\Handler\\Interfaces\\TaskAddTypeHandlerInterface",
            "AppBundle\\Entity\\Task",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "AppBundle\\Entity\\Task",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Form\\Handler\\Interfaces\\TaskAddTypeHandlerInterface",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "AppBundle\\Entity\\Task",
            "AppBundle\\Repository\\Interfaces\\TaskRepositoryInterface",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "AppBundle\\Entity\\Task",
            "AppBundle\\Repository\\Interfaces\\TaskRepositoryInterface",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller"
        ],
        "lcom": 1,
        "length": 79,
        "vocabulary": 20,
        "volume": 341.43,
        "difficulty": 5.91,
        "effort": 2018.47,
        "level": 0.17,
        "bugs": 0.11,
        "time": 112,
        "intelligentContent": 57.75,
        "number_operators": 12,
        "number_operands": 67,
        "number_operators_unique": 3,
        "number_operands_unique": 17,
        "cloc": 28,
        "loc": 70,
        "lloc": 42,
        "mi": 87.97,
        "mIwoC": 46.45,
        "commentWeight": 41.52,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 225,
        "relativeDataComplexity": 0.55,
        "relativeSystemComplexity": 225.55,
        "totalStructuralComplexity": 1125,
        "totalDataComplexity": 2.75,
        "totalSystemComplexity": 1127.75,
        "package": "AppBundle\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 7,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Controller\\UserController",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "listAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 5,
        "ccn": 3,
        "ccnMethodMax": 2,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Form\\Handler\\Interfaces\\UserRegistrationTypeHandlerInterface",
            "AppBundle\\Entity\\User",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "AppBundle\\Entity\\Interfaces\\UserInterface",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Form\\Handler\\Interfaces\\UserUpdateTypeHandlerInterface",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller"
        ],
        "lcom": 1,
        "length": 57,
        "vocabulary": 17,
        "volume": 232.99,
        "difficulty": 5.04,
        "effort": 1173.25,
        "level": 0.2,
        "bugs": 0.08,
        "time": 65,
        "intelligentContent": 46.27,
        "number_operators": 10,
        "number_operands": 47,
        "number_operators_unique": 3,
        "number_operands_unique": 14,
        "cloc": 18,
        "loc": 47,
        "lloc": 29,
        "mi": 92.04,
        "mIwoC": 51.12,
        "commentWeight": 40.92,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 100,
        "relativeDataComplexity": 0.61,
        "relativeSystemComplexity": 100.61,
        "totalStructuralComplexity": 300,
        "totalDataComplexity": 1.82,
        "totalSystemComplexity": 301.82,
        "package": "AppBundle\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 8,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Entity\\Task",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCreatedAt",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCreatedAt",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTitle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTitle",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getContent",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setContent",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isDone",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "toggle",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 10,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 2,
        "nbMethodsSetters": 4,
        "wmc": 10,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "AppBundle\\Entity\\Interfaces\\TaskInterface",
            "Datetime"
        ],
        "parents": [],
        "lcom": 1,
        "length": 30,
        "vocabulary": 7,
        "volume": 84.22,
        "difficulty": 3.8,
        "effort": 320.04,
        "level": 0.26,
        "bugs": 0.03,
        "time": 18,
        "intelligentContent": 22.16,
        "number_operators": 11,
        "number_operands": 19,
        "number_operators_unique": 2,
        "number_operands_unique": 5,
        "cloc": 53,
        "loc": 103,
        "lloc": 50,
        "mi": 94.14,
        "mIwoC": 49.32,
        "commentWeight": 44.81,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 5.4,
        "relativeSystemComplexity": 5.4,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 54,
        "totalSystemComplexity": 54,
        "package": "AppBundle\\Entity\\",
        "pageRank": 0.02,
        "afferentCoupling": 2,
        "efferentCoupling": 2,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "AppBundle\\Entity\\User",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUsername",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUsername",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSalt",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPassword",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPassword",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getEmail",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setEmail",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getRoles",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "eraseCredentials",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getIsAdmin",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setIsAdmin",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 13,
        "nbMethods": 8,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 8,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 4,
        "wmc": 14,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "AppBundle\\Entity\\Interfaces\\UserInterface"
        ],
        "parents": [],
        "lcom": 3,
        "length": 35,
        "vocabulary": 10,
        "volume": 116.27,
        "difficulty": 4.5,
        "effort": 523.2,
        "level": 0.22,
        "bugs": 0.04,
        "time": 29,
        "intelligentContent": 25.84,
        "number_operators": 14,
        "number_operands": 21,
        "number_operators_unique": 3,
        "number_operands_unique": 7,
        "cloc": 65,
        "loc": 128,
        "lloc": 63,
        "mi": 90.67,
        "mIwoC": 46.02,
        "commentWeight": 44.65,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 4.15,
        "relativeSystemComplexity": 5.15,
        "totalStructuralComplexity": 13,
        "totalDataComplexity": 54,
        "totalSystemComplexity": 67,
        "package": "AppBundle\\Entity\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 1,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\Handler\\TaskAddTypeTypeHandler",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "handle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 4,
        "ccn": 3,
        "ccnMethodMax": 3,
        "externals": [
            "AppBundle\\Form\\Handler\\Interfaces\\TaskAddTypeHandlerInterface",
            "AppBundle\\Repository\\Interfaces\\TaskRepositoryInterface",
            "Symfony\\Component\\Form\\FormInterface",
            "AppBundle\\Entity\\Interfaces\\TaskInterface"
        ],
        "parents": [],
        "lcom": 1,
        "length": 14,
        "vocabulary": 8,
        "volume": 42,
        "difficulty": 4.5,
        "effort": 189,
        "level": 0.22,
        "bugs": 0.01,
        "time": 11,
        "intelligentContent": 9.33,
        "number_operators": 5,
        "number_operands": 9,
        "number_operators_unique": 4,
        "number_operands_unique": 4,
        "cloc": 12,
        "loc": 29,
        "lloc": 17,
        "mi": 103.37,
        "mIwoC": 61.39,
        "commentWeight": 41.98,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.88,
        "relativeSystemComplexity": 9.88,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 1.75,
        "totalSystemComplexity": 19.75,
        "package": "AppBundle\\Form\\Handler\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\Handler\\UserRegistrationTypeHandler",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "handle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 4,
        "ccn": 3,
        "ccnMethodMax": 3,
        "externals": [
            "AppBundle\\Form\\Handler\\Interfaces\\UserRegistrationTypeHandlerInterface",
            "Symfony\\Component\\Security\\Core\\Encoder\\EncoderFactoryInterface",
            "AppBundle\\Repository\\Interfaces\\UserRepositoryInterface",
            "AppBundle\\Service\\Interfaces\\PasswordGeneratorInterface",
            "AppBundle\\Service\\Interfaces\\MailerInterface",
            "Symfony\\Component\\Form\\FormInterface",
            "AppBundle\\Entity\\Interfaces\\UserInterface"
        ],
        "parents": [],
        "lcom": 1,
        "length": 41,
        "vocabulary": 14,
        "volume": 156.1,
        "difficulty": 6.2,
        "effort": 967.83,
        "level": 0.16,
        "bugs": 0.05,
        "time": 54,
        "intelligentContent": 25.18,
        "number_operators": 10,
        "number_operands": 31,
        "number_operators_unique": 4,
        "number_operands_unique": 10,
        "cloc": 21,
        "loc": 49,
        "lloc": 28,
        "mi": 95.12,
        "mIwoC": 52.67,
        "commentWeight": 42.45,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 81,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 81.5,
        "totalStructuralComplexity": 162,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 163,
        "package": "AppBundle\\Form\\Handler\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 7,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\Handler\\UserUpdateTypeHandler",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "handle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 4,
        "ccn": 3,
        "ccnMethodMax": 3,
        "externals": [
            "AppBundle\\Form\\Handler\\Interfaces\\UserUpdateTypeHandlerInterface",
            "AppBundle\\Repository\\Interfaces\\UserRepositoryInterface",
            "AppBundle\\Service\\Interfaces\\MailerInterface",
            "Symfony\\Component\\Form\\FormInterface",
            "AppBundle\\Entity\\Interfaces\\UserInterface"
        ],
        "parents": [],
        "lcom": 1,
        "length": 22,
        "vocabulary": 11,
        "volume": 76.11,
        "difficulty": 4.57,
        "effort": 347.92,
        "level": 0.22,
        "bugs": 0.03,
        "time": 19,
        "intelligentContent": 16.65,
        "number_operators": 6,
        "number_operands": 16,
        "number_operators_unique": 4,
        "number_operands_unique": 7,
        "cloc": 12,
        "loc": 32,
        "lloc": 20,
        "mi": 98.67,
        "mIwoC": 58.04,
        "commentWeight": 40.63,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.8,
        "relativeSystemComplexity": 16.8,
        "totalStructuralComplexity": 32,
        "totalDataComplexity": 1.6,
        "totalSystemComplexity": 33.6,
        "package": "AppBundle\\Form\\Handler\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\TaskAddType",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "AppBundle\\Form\\Interfaces\\TaskAddTypeInterface",
            "Symfony\\Component\\Form\\FormBuilderInterface"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "lcom": 1,
        "length": 5,
        "vocabulary": 4,
        "volume": 10,
        "difficulty": 0,
        "effort": 0,
        "level": 1.6,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 16,
        "number_operators": 0,
        "number_operands": 5,
        "number_operators_unique": 0,
        "number_operands_unique": 4,
        "cloc": 6,
        "loc": 14,
        "lloc": 8,
        "mi": 115.62,
        "mIwoC": 73.16,
        "commentWeight": 42.45,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 1,
        "relativeSystemComplexity": 2,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 2,
        "package": "AppBundle\\Form\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\UserRegistrationType",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "AppBundle\\Form\\Interfaces\\UserRegistrationTypeInterface",
            "Symfony\\Component\\Form\\FormBuilderInterface"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "lcom": 1,
        "length": 13,
        "vocabulary": 10,
        "volume": 43.19,
        "difficulty": 0,
        "effort": 0,
        "level": 1.54,
        "bugs": 0.01,
        "time": 0,
        "intelligentContent": 66.44,
        "number_operators": 0,
        "number_operands": 13,
        "number_operators_unique": 0,
        "number_operands_unique": 10,
        "cloc": 6,
        "loc": 14,
        "lloc": 8,
        "mi": 111.17,
        "mIwoC": 68.71,
        "commentWeight": 42.45,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 1,
        "relativeSystemComplexity": 2,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 2,
        "package": "AppBundle\\Form\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Repository\\TaskRepository",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "save",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "flush",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "delete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 5,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "AppBundle\\Repository\\Interfaces\\TaskRepositoryInterface",
            "Symfony\\Bridge\\Doctrine\\RegistryInterface",
            "parent",
            "AppBundle\\Entity\\Interfaces\\TaskInterface",
            "this",
            "AppBundle\\Entity\\Interfaces\\TaskInterface",
            "this"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "lcom": 2,
        "length": 14,
        "vocabulary": 4,
        "volume": 28,
        "difficulty": 2.17,
        "effort": 60.67,
        "level": 0.46,
        "bugs": 0.01,
        "time": 3,
        "intelligentContent": 12.92,
        "number_operators": 1,
        "number_operands": 13,
        "number_operators_unique": 1,
        "number_operands_unique": 3,
        "cloc": 15,
        "loc": 41,
        "lloc": 26,
        "mi": 99.02,
        "mIwoC": 58.73,
        "commentWeight": 40.29,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 0.11,
        "relativeSystemComplexity": 36.11,
        "totalStructuralComplexity": 144,
        "totalDataComplexity": 0.43,
        "totalSystemComplexity": 144.43,
        "package": "AppBundle\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Repository\\UserRepository",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "save",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 3,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "AppBundle\\Repository\\Interfaces\\UserRepositoryInterface",
            "Symfony\\Bridge\\Doctrine\\RegistryInterface",
            "parent",
            "AppBundle\\Entity\\Interfaces\\UserInterface"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "lcom": 2,
        "length": 8,
        "vocabulary": 4,
        "volume": 16,
        "difficulty": 1.17,
        "effort": 18.67,
        "level": 0.86,
        "bugs": 0.01,
        "time": 1,
        "intelligentContent": 13.71,
        "number_operators": 1,
        "number_operands": 7,
        "number_operators_unique": 1,
        "number_operands_unique": 3,
        "cloc": 9,
        "loc": 24,
        "lloc": 15,
        "mi": 106.28,
        "mIwoC": 65.64,
        "commentWeight": 40.63,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.2,
        "relativeSystemComplexity": 16.2,
        "totalStructuralComplexity": 32,
        "totalDataComplexity": 0.4,
        "totalSystemComplexity": 32.4,
        "package": "AppBundle\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Service\\Mailer",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "sendMail",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getMailerFrom",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 3,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "AppBundle\\Service\\Interfaces\\MailerInterface",
            "Twig_Environment",
            "Swift_Mailer",
            "AppBundle\\Entity\\Interfaces\\UserInterface",
            "Swift_Message"
        ],
        "parents": [],
        "lcom": 1,
        "length": 33,
        "vocabulary": 14,
        "volume": 125.64,
        "difficulty": 3.55,
        "effort": 445.46,
        "level": 0.28,
        "bugs": 0.04,
        "time": 25,
        "intelligentContent": 35.44,
        "number_operators": 7,
        "number_operands": 26,
        "number_operators_unique": 3,
        "number_operands_unique": 11,
        "cloc": 12,
        "loc": 34,
        "lloc": 22,
        "mi": 95.67,
        "mIwoC": 55.88,
        "commentWeight": 39.79,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 81,
        "relativeDataComplexity": 0.3,
        "relativeSystemComplexity": 81.3,
        "totalStructuralComplexity": 243,
        "totalDataComplexity": 0.9,
        "totalSystemComplexity": 243.9,
        "package": "AppBundle\\Service\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Service\\PasswordGenerator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "generate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "AppBundle\\Service\\Interfaces\\PasswordGeneratorInterface"
        ],
        "parents": [],
        "lcom": 1,
        "length": 8,
        "vocabulary": 7,
        "volume": 22.46,
        "difficulty": 1.2,
        "effort": 26.95,
        "level": 0.83,
        "bugs": 0.01,
        "time": 1,
        "intelligentContent": 18.72,
        "number_operators": 2,
        "number_operands": 6,
        "number_operators_unique": 2,
        "number_operands_unique": 5,
        "cloc": 9,
        "loc": 19,
        "lloc": 10,
        "mi": 112.36,
        "mIwoC": 68.59,
        "commentWeight": 43.77,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 1,
        "relativeSystemComplexity": 1,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 1,
        "package": "AppBundle\\Service\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    }
]