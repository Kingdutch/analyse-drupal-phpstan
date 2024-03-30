<?php

$errorClassification = [
  'missingFunctionReturn' => [
    'message' => 'Function has no return type specified.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' =>  "#^Function ",
        'ends_with' => ' has no return type specified\.$#',
      ],
    ],
  ],
  'missingInterfaceMethodReturn' => [
    'message' => 'Method has no return type specified in *Interface.php',
    'count' => 0,
    'criteria' => [
      'path' => [
        'ends_with' => 'Interface.php',
      ],
      'message' => [
        'starts_with' =>  "#^Method ",
        'ends_with' => ' has no return type specified\.$#',
      ],
    ],
  ],
  'missingOtherMethodReturn' => [
    'message' => 'Method has no return type specified.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' =>  "#^Method ",
        'ends_with' => ' has no return type specified\.$#',
      ],
    ],
  ],
  'invalidMethodReturn' => [
    'message' => 'Method has invalid return type.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' =>  "#^Method ",
        'contains' => ' has invalid return type ',
      ],
    ],
  ],

  'unreachable' => [
    'message' => 'Unreachable statement.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' =>  "#^Unreachable statement",
      ],
    ],
  ],
  'ifAlwaysTrue' => [
    'message' => 'if-statements that will always be TRUE.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'contains' => 'If condition is always true',
      ],
    ],
  ],
  'ifAlwaysFalse' => [
    'message' => 'if-statements that will always be FALSE.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'contains' => 'If condition is always false',
      ],
    ],
  ],
  'partialConditionAlwaysFalse' => [
    'message' => 'Right/Left side of condition is always false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^Right side of ',
          'ends_with' => ' is always false\\.$#',
        ],
        [
          'starts_with' => '#^Left side of ',
          'ends_with' => ' is always false\\.$#',
        ]
      ],
    ],
  ],
  'partialConditionAlwaysTrue' => [
    'message' => 'Right/Left side of condition is always true.',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^Right side of ',
          'ends_with' => ' is always true\\.$#',
        ],
        [
          'starts_with' => '#^Left side of ',
          'ends_with' => ' is always true\\.$#',
        ]
      ],
    ],
  ],
  'accessUndefinedPropertyObject' => [
    'message' => 'Access to an undefined property on property object.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Access to an undefined property ',
        'contains' => 'property object',
      ],
    ],
  ],
  'accessUndefinedPropertyOthers' => [
    'message' => 'Access to an undefined property.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Access to an undefined property ',
      ],
    ],
  ],
  'methodCallOnMaybeNull' => [
    'message' => 'Cannot call method on x|null.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Cannot call method ',
        'ends_with' => '|null\\.$#'
      ],
    ],
  ],
  'methodCallOnMaybeFalse' => [
    'message' => 'Cannot call method on x|false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Cannot call method ',
        'ends_with' => '|false\\.$#'
      ],
    ],
  ],
  'propertyAccessOnMaybeNull' => [
    'message' => 'Cannot access property on x|null.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Cannot access property ',
        'ends_with' => '|null\\.$#'
      ],
    ],
  ],
  'propertyAccessOnMaybeFalse' => [
    'message' => 'Cannot access property on x|false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Cannot access property ',
        'ends_with' => '|false\\.$#'
      ],
    ],
  ],
  'incorrectReturn' => [
    'message' => "Something should return x but returns y.",
    'count' => 0,
    'criteria' => [
      'message' => [
        'contains' => [' should return ', ' but returns '],
      ],
    ],
  ],
  'invalidTypeForeach' => [
    'message' => 'Argument of an invalid type supplied for foreach, only iterables are supported.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Argument of an invalid type ',
        'ends_with' => ' supplied for foreach, only iterables are supported\.$#'
      ],
    ],
  ],
  'binaryOperationError' => [
    'message' => 'Binary operation results in an error.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Binary operation ',
        'ends_with' => ' results in an error\.$#',
      ],
    ],
  ],
  'callToUndefined' => [
    'message' => 'Call to an undefined method.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to an undefined method ',
      ],
    ],
  ],
  'poisonousMixedType' => [
    'message' => 'Unsupported operation on mixed type.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'ends_with' => ' on mixed\.$#',
      ],
    ],
  ],
  'callToUnneededAssert' => [
    'message' => 'Call to function assert() will always evaluate to true/false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to function assert\(\) ',
      ],
    ],
  ],
  'isArrayAlwaysFalse' => [
    'message' => 'Call to function is_array() will always evaluate to false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to function is_array\(\) with ',
        'ends_with' => ' will always evaluate to false\.$#',
      ],
    ],
  ],
  'isArrayAlwaysTrue' => [
    'message' => 'Call to function is_array() will always evaluate to true.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to function is_array\(\) with ',
        'ends_with' => ' will always evaluate to true\.$#',
      ],
    ],
  ],
  'isBoolAlways' => [
    'message' => 'Call to function is_bool() will always evaluate to true/false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to function is_bool\(\) ',
      ],
    ],
  ],
  'isCallableAlways' => [
    'message' => 'Call to function is_callable() will always evaluate to true/false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to function is_callable\(\) ',
      ],
    ],
  ],
  'isIntAlways' => [
    'message' => 'Call to function is_int() will always evaluate to true/false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to function is_int\(\) ',
      ],
    ],
  ],
  'isNullAlways' => [
    'message' => 'Call to function is_null() will always evaluate to true/false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to function is_null\(\) ',
      ],
    ],
  ],
  'isNumericAlways' => [
    'message' => 'Call to function is_numeric() will always evaluate to true/false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to function is_numeric\(\) ',
      ],
    ],
  ],
  'isObjectAlways' => [
    'message' => 'Call to function is_object() will always evaluate to true/false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to function is_object\(\) ',
      ],
    ],
  ],
  'isResourceAlways' => [
    'message' => 'Call to function is_resource() will always evaluate to true/false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to function is_resource\(\) ',
      ],
    ],
  ],
  'isStringAlways' => [
    'message' => 'Call to function is_string() will always evaluate to true/false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to function is_string\(\) ',
      ],
    ],
  ],
  'isSubclassOfAlways' => [
    'message' => 'Call to function is_subclass_of() will always evaluate to true/false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to function is_subclass_of\(\) ',
      ],
    ],
  ],
  'methodExistsAlways' => [
    'message' => 'Call to function method_exists() will always evaluate to true/false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to function method_exists\(\) ',
      ],
    ],
  ],
  'propertyExistsAlways' => [
    'message' => 'Call to function property_exists() will always evaluate to true/false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to function property_exists\(\) ',
      ],
    ],
  ],
  'unneededPHPUnitAssert' => [
    'message' => 'unnecessary PHPUnit Assert.',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^Call to method PHPUnit\\\\Framework\\\\Assert\:\:assert',
        ],
        [
          'starts_with' => '#^Call to static method PHPUnit\\\\Framework\\\\Assert\:\:assert',
        ],
      ],
    ],
  ],
  'functionMissingParameterType' => [
    'message' => 'Function has parameter with no type specified.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Function ',
        'contains' => ' has parameter ',
        'ends_with' => ' with no type specified\.$#',
      ],
    ],
  ],
  'methodMissingParameterType' => [
    'message' => 'Method has parameter with no type specified.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Method ',
        'contains' => ' has parameter ',
        'ends_with' => ' with no type specified\.$#',
      ],
    ],
  ],
  'otherAlwaysTrue' => [
    'message' => 'Statement is always (evaluate to) true.',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'ends_with' => ' is always true\.$#',
        ],
        [
          'ends_with' => ' is always evaluate to true\.$#',
        ],
      ],
    ],
  ],
  'otherAlwaysFalse' => [
    'message' => 'Statement is always (evaluate to) false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'ends_with' => ' is always false\.$#',
        ],
        [
          'ends_with' => ' is always evaluate to false\.$#',
        ],
      ],
    ],
  ],
  'drupalLoginMaybeFalse' => [
    'message' => 'Parameter #1 to method drupalLogin may be false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Parameter \#1 ',
        'contains' => 'drupalLogin',
      ],
    ],
  ],
  'incorrectParam' => [
    'message' => 'Parameter n expects x but y given.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Parameter ',
        'contains' => ' expects ',
        'ends_with' => ' given\.$#',
      ],
    ],
  ],
  'variableUndefined' => [
    'message' => 'Variable might not be defined',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Variable ',
        'ends_with' => ' might not be defined\.$#',
      ],
    ],
  ],
  'methodMissingReturnStatement' => [
    'message' => 'Method should return non-void but return statement is missing.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Method ',
        'contains' => ' should return ',
        'ends_with' => ' but return statement is missing\.$#',
      ],
    ],
  ],
  'functionEmptyReturnStatement' => [
    'message' => 'Function should return non-void but empty return statement found.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Function ',
        'contains' => ' should return ',
        'ends_with' => ' but empty return statement found\.$#',
      ],
    ],
  ],  'functionMissingReturnStatement' => [
    'message' => 'Function should return non-void but return statement is missing.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Function ',
        'contains' => ' should return ',
        'ends_with' => ' but return statement is missing\.$#',
      ],
    ],
  ],
  'variableIssetNotNullable' => [
    'message' => 'Variable in isset() always exists and is not nullable.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Variable ',
        'ends_with' => ' in isset\(\) always exists and is not nullable\.$#',
      ],
    ],
  ],
  'variableEmptyNotFalsy' => [
    'message' => 'Variable in empty() always exists and is not falsy.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Variable ',
        'ends_with' => ' in empty\(\) always exists and is not falsy\.$#',
      ],
    ],
  ],
  'variableEmptyAlwaysFalsy' => [
    'message' => 'Variable in empty() always exists and is always falsy.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Variable ',
        'ends_with' => ' in empty\(\) always exists and is always falsy\.$#',
      ],
    ],
  ],
  'offsetAlwaysExistsNonNullable' => [
    'message' => 'Offset in isset always exists and is not nullable.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Offset ',
        'ends_with' => ' in isset\(\) always exists and is not nullable\.$#',
      ],
    ],
  ],
  'offsetDoesNotExist' => [
    'message' => 'Offset does not exist.',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^Offset ',
          'ends_with' => ' does not exist\.$#',
        ],
        [
          'starts_with' => '#^Offset ',
          'contains' => ' does not exist on ',
        ],
      ],
    ],
  ],
  'unusedConstructorParameter' => [
    'message' => 'Constructor of class has an unused parameter',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Constructor of class ',
        'contains' => ' has an unused parameter ',
      ],
    ],
  ],
  'castMixed' => [
    'message' => 'Cannot cast mixed',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Cannot cast mixed to ',
      ],
    ],
  ],
  'deprecationWarning' => [
    'message' => 'Deprecation warnings.',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^Call to deprecated ',
        ],
        [
          'starts_with' => '#^Class ',
          'contains' => ' implements deprecated interface ',
        ],
        [
          'starts_with' => '#^Usage of deprecated trait ',
          'contains' => ' in class ',
        ],
        [
          'starts_with' => '#^Access to deprecated property ',
          'contains' => ' of class ',
        ],
        [
          'starts_with' => '#^Fetching deprecated class constant ',
          'contains' => ' of class ',
        ],
        [
          'starts_with' => '#^Class ',
          'contains' => ' extends deprecated class ',
        ],
      ],
    ],
  ],
  'propertyDoesNotAcceptNull' => [
    'message' => 'Property does not accept null.',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^Property ',
          'contains' => ' does not accept ',
          'ends_with' => 'null\.$#',
        ],
      ],
    ],
  ],
  'strictComparisonAlwaysTrue' => [
    'message' => 'Strict comparison will always evaluate to true.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Strict comparison using ',
        'ends_with' => ' will always evaluate to true\.$#',
      ],
    ],
  ],
  'strictComparisonAlwaysFalse' => [
    'message' => 'Strict comparison will always evaluate to false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Strict comparison using ',
        'ends_with' => ' will always evaluate to false\.$#',
      ],
    ],
  ],
  'arrayOffsetOnMaybeNotArray' => [
    'message' => 'Cannot access offset on array|other.',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^Cannot access an offset on ',
        ],
        [
          'starts_with' => '#^Cannot access offset ',
          'contains' => ' on array\|',
        ],
        [
          'starts_with' => '#^Cannot access offset ',
          'contains' => [' on ', 'array'],
        ],
        [
          'starts_with' => '#^Cannot access offset ',
          'contains' => [' on ', 'list'],
        ],
      ],
    ],
  ],
  // Must come after arrayOffsetOnMaybeNotArray.
  'arrayOffsetOnNonArray' => [
    'message' => 'Cannot access offset on non-array type.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Cannot access offset ',
      ],
    ],
  ],
  'classUnspecifiedGenericExtends' => [
    'message' => 'Class extends generic class but does not specify its types.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Class ',
        'contains' => [' extends generic class ', ' but does not specify its types'],
      ],
    ],
  ],
  'classUnspecifiedGenericImplements' => [
    'message' => 'Class implements generic interface but does not specify its types.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Class ',
        'contains' => [' implements generic interface ', ' but does not specify its types'],
      ],
    ],
  ],
  'interfaceUnspecifiedGenericExtends' => [
    'message' => 'Interface extends generic interface but does not specify its types.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Interface ',
        'contains' => [' extends generic interface ', ' but does not specify its types'],
      ],
    ],
  ],
  'instanceofAlwaysTrue' => [
    'message' => 'Instanceof will always evaluate to true.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Instanceof between ',
        'ends_with' => ' will always evaluate to true\.$#',
      ],
    ],
  ],
  'instanceofAlwaysFalse' => [
    'message' => 'Instanceof will always evaluate to false.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Instanceof between ',
        'ends_with' => ' will always evaluate to false\.$#',
      ],
    ],
  ],
  'shapeDoesNotAccept' => [
    'message' => 'x does not accept y',
    'count' => 0,
    'criteria' => [
      'message' => [
        'contains' => ' does not accept ',
      ],
    ],
  ],
  'undefinedStaticPropertyAccess' => [
    'message' => 'Access to an undefined static property.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Access to an undefined static property ',
      ],
    ],
  ],
  'callToUndefinedStaticMethod' => [
    'message' => 'Call to an undefined static method',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to an undefined static method ',
      ],
    ],
  ],
  'callOnSeparateLineHasNoEffect' => [
    'message' => 'Call to function on a separate line has no effect.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to function ',
        'ends_with' => ' on a separate line has no effect\.$#',
      ],
    ],
  ],
  'methodCallOnUnknownClass' => [
    'message' => 'Call to method on an unknown class',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Call to method ',
        'contains' => ' on an unknown class ',
      ],
    ],
  ],
  'cannotAccessPropertyMaybeObject' => [
    'message' => 'Cannot access property on x|y',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Cannot access property ',
        'contains' => '|',
      ],
    ],
  ],
  'cannotAccessPropertyOnArray' => [
    'message' => 'Cannot access property on array',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^Cannot access property ',
          'contains' => ' on array\<',
          'ends_with' => '\>\.$#',
        ],
        [
          'starts_with' => '#^Cannot access property ',
          'ends_with' => ' on array\.$#',
        ],
      ],
    ],
  ],
  'cannotAccessPropertyOnScalar' => [
    'message' => 'Cannot access property on scalar',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^Cannot access property ',
          'ends_with' => ' on false\.$#',
        ],
        [
          'starts_with' => '#^Cannot access property ',
          'ends_with' => ' on null\.$#',
        ],
        [
          'starts_with' => '#^Cannot access property ',
          'ends_with' => ' on string\.$#',
        ],
        [
          'starts_with' => '#^Cannot access property ',
          'ends_with' => ' on bool\|string\.$#',
        ],
      ],
    ],
  ],
  'cannotAssignOffsetToArray' => [
    'message' => 'Cannot assign offset to array',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^Cannot assign new offset to array',
        ],
        [
          'starts_with' => '#^Cannot assign offset',
          'contains' => ' to array',
        ],
      ],
    ],
  ],
  'cannotAssignOffsetToScalar' => [
    'message' => 'Cannot assign offset to scalar',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^Cannot assign new offset to string\.$#',
        ],
        [
          'starts_with' => '#^Cannot assign offset',
          'ends_with' => ' to string\.$#',
        ],
      ],
    ],
  ],
  'cannotAssignOffsetToFieldItemListInterface' => [
    'message' => 'Cannot assign offset to FieldItemListInterface',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^Cannot assign new offset to string\.$#',
        ],
        [
          'starts_with' => '#^Cannot assign offset ',
          'ends_with' => 'FieldItemListInterface\.$#',
        ],
      ],
    ],
  ],
  'cannotCallMethodOnMaybeType' => [
    'message' => 'Cannot call method on class|other',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Cannot call method ',
        'contains' => '|',
      ],
    ],
  ],
  'cannotCallMethodOnArray' => [
    'message' => 'Cannot call method on array',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Cannot call method ',
        'ends_with' => ' on array\.$#',
      ],
    ],
  ],
  'cannotCallMethodOnScalar' => [
    'message' => 'Cannot call method on scalar',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^Cannot call method ',
          'ends_with' => ' on string\.$#',
        ],
        [
          'starts_with' => '#^Cannot call method ',
          'ends_with' => ' on callable\.$#',
        ],
        [
          'starts_with' => '#^Cannot call method ',
          'contains' => ' on array\<',
        ],
        [
          'starts_with' => '#^Cannot call method ',
          'ends_with' => ' on null\.$#',
        ],
        [
          'starts_with' => '#^Cannot call method ',
          'ends_with' => ' on false\.$#',
        ],
        [
          'starts_with' => '#^Cannot call method ',
          'ends_with' => ' on bool\.$#',
        ],
        [
          'starts_with' => '#^Cannot call method ',
          'ends_with' => ' on int\.$#',
        ],
      ],
    ],
  ],
  'cannotCallStaticMethodOnMaybeType' => [
    'message' => 'Cannot call static method on class|other',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Cannot call static method ',
        'contains' => '|',
      ],
    ],
  ],
  'cannotCastToString' => [
    'message' => 'Cannot cast to string',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Cannot cast ',
        'ends_with' => ' to string\.$#',
      ],
    ],
  ],
  'encapsedStringCannotBeCast' => [
    'message' => 'Part of encapsed string cannot be cast to string.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Part ',
        'ends_with' => ' of encapsed string cannot be cast to string\.$#',
      ],
    ],
  ],
  'cannotCloneMaybeNull' => [
    'message' => 'Cannot clone type|null',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Cannot clone ',
        'ends_with' => '|null\.$#',
      ],
    ],
  ],
  'incorrectCaseClass' => [
    'message' => 'Class referenced with incorrect case',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Class ',
        'contains' => ' referenced with incorrect case\: ',
      ],
    ],
  ],
  'comparisonError' => [
    'message' => 'Comparison operation results in an error',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Comparison operation ',
        'ends_with' => ' results in an error\.$#',
      ],
    ],
  ],
  'deadCatch' => [
    'message' => 'Dead catch in try/catch block',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Dead catch ',
        'ends_with' => ' is never thrown in the try block\.$#',
      ],
    ],
  ],
  'incompatibleDefaultParameterValue' => [
    'message' => 'Default value of parameter is incompatible with type',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Default value of the parameter ',
        'contains' => 'is incompatible with type ',
      ],
    ],
  ],
  'uselessExpression' => [
    'message' => 'Expression on a separate line does not do anything',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Expression ',
        'ends_with' => ' on a separate line does not do anything\.$#',
      ],
    ],
  ],
  'functionParameterGenericInterface' => [
    'message' => 'Function has parameter with generic interface but does not specify its types',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Function ',
        'contains' => [' has parameter ', ' with generic interface ', ' but does not specify its types\: '],
      ],
    ],
  ],
  'functionParameterIterableType' => [
    'message' => 'Function has parameter with no value type specified in iterable type',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Function ',
        'contains' => [' has parameter ', ' with no value type specified in iterable type '],
      ],
    ],
  ],
  'functionParameterSandboxNull' => [
    'message' => 'Function never assigns null to $sandbox so it can be removed from the by-ref type.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Function ',
        'ends_with' => ' never assigns null to &\$sandbox so it can be removed from the by\-ref type\.$#',
      ],
    ],
  ],
  'interfaceIncorrectCase' => [
    'message' => 'Interface referenced with incorrect case.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Interface ',
        'contains' => ' referenced with incorrect case\: ',
      ],
    ],
  ],
  'incorrectParameterCount' => [
    'message' => 'Method invoked with n parameter, m required',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^Method ',
          'contains' => [' invoked with ', ' parameter, '],
          'ends_with' => ' required\.$#',
        ],
        [
          'starts_with' => '#^Method ',
          'contains' => [' invoked with ', ' parameters, '],
          'ends_with' => ' required\.$#',
        ],
        [
          'starts_with' => '#^Static method ',
          'contains' => [' invoked with ', ' parameter, '],
          'ends_with' => ' required\.$#',
        ],
        [
          'starts_with' => '#^Static method ',
          'contains' => [' invoked with ', ' parameters, '],
          'ends_with' => ' required\.$#',
        ],
      ],
    ],
  ],
  'methodGenericParameterTypesClass' => [
    'message' => 'Method has parameter with generic class but does not specify its types.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Method ',
        'contains' => [' has parameter ', ' with generic class ', ' but does not specify its types\: '],
      ],
    ],
  ],
  'methodGenericParameterTypesInterface' => [
    'message' => 'Method has parameter with generic interface but does not specify its types.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Method ',
        'contains' => [' has parameter ', ' with generic interface ', ' but does not specify its types\: '],
      ],
    ],
  ],
  'methodGenericParameterTypesIterable' => [
    'message' => 'Method has parameter with no value type specified in iterable type.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Method ',
        'contains' => [' has parameter ', ' with no value type specified in iterable type '],
      ],
    ],
  ],
  'methodReturnGenericClass' => [
    'message' => 'Method return type with generic class does not specify its types.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Method ',
        'contains' => [' return type with generic class ', ' does not specify its types\: '],
      ],
    ],
  ],
  'methodReturnGenericInterface' => [
    'message' => 'Method return type with generic interface does not specify its types.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Method ',
        'contains' => [' return type with generic interface ', ' does not specify its types\: '],
      ],
    ],
  ],
  'methodReturnIterableType' => [
    'message' => 'Method return type has no value type specified in iterable type',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Method ',
        'contains' => ' return type has no value type specified in iterable type ',
      ],
    ],
  ],
  'methodNeverReturnsNull' => [
    'message' => 'Method never returns null so it can be removed from the return type',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Method ',
        'ends_with' => ' never returns null so it can be removed from the return type\.$#',
      ],
    ],
  ],
  'methodNeverAssignsNull' => [
    'message' => 'Method never assigns null to so it can be removed from the by-ref type.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Method ',
        'contains' => 'never assigns null to',
        'ends_with' => ' so it can be removed from the by\-ref type\.$#',
      ],
    ],
  ],
  'methodShouldNotReturn' => [
    'message' => 'Method with return type void should not return anything.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Method ',
        'contains' => ' with return type void returns ',
        'ends_with' => ' but should not return anything\.$#',
      ],
    ],
  ],
  'methodEmptyReturn' => [
    'message' => 'Method should return something but empty return statement found.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Method ',
        'contains' => ' should return ',
        'ends_with' => ' but empty return statement found\.$#',
      ],
    ],
  ],
  'propertyGenericInterface' => [
    'message' => 'Property with generic interface does not specify its types',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Property ',
        'contains' => [' with generic interface ', ' does not specify its types\:'],
      ],
    ],
  ],
  'propertyGenericClass' => [
    'message' => 'Property with generic class does not specify its types',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Property ',
        'contains' => [' with generic class ', ' does not specify its types\:'],
      ],
    ],
  ],
  'propertyUnknownClass' => [
    'message' => 'Property has unknown class',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Property ',
        'contains' => ' has unknown class ',
      ],
    ],
  ],
  'propertyHasNoIterableType' => [
    'message' => 'Property has no value type specified in iterable type',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Property ',
        'contains' => ' type has no value type specified in iterable type ',
      ],
    ],
  ],
  'offsetMightNotExist' => [
    'message' => 'Offset might not exist',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Offset ',
        'contains' => ' might not exist on ',
      ],
    ],
  ],
  'phpdocParamInvalidSubtype' => [
    'message' => 'PHPDoc tag @param is not subtype of native type.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @param for parameter ',
        'contains' => ' is not subtype of native type ',
      ],
    ],
  ],
  'phpdocParamInvalidValue' => [
    'message' => 'PHPDoc tag @pram has invalid value',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @param has invalid value ',
      ],
    ],
  ],
  'phpdocUnknownParameter' => [
    'message' => 'PHPDoc tag @param references unknown parameter',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @param references unknown parameter\: ',
      ],
    ],
  ],
  'phpdocReturnInvalidSubtype' => [
    'message' => 'PHPDoc tag @return is incompatible with/not subtype of native type',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^PHPDoc tag @return with type ',
          'contains' => ' is incompatible with native type ',
        ],
        [
          'starts_with' => '#^PHPDoc tag @return with type ',
          'contains' => ' is not subtype of native type ',
        ],
      ],
    ],
  ],
  'phpdocInvalidThrow' => [
    'message' => 'PHPDoc tag @throws has invalid value.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @throws has invalid value ',
      ],
    ],
  ],
  'phpdocPropertyInvalidSubtype' => [
    'message' => 'PHPDoc tag @var for property is incompatible with native type',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @var for property ',
        'contains' => ' is incompatible with native type ',
      ],
    ],
  ],
  'phpdocVarInvalidValue' => [
    'message' => 'PHPDoc tag @var has invalid value',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @var has invalid value ',
      ],
    ],
  ],
  'phpdocInlineVarInvalidSubtype' => [
    'message' => 'PHPDoc tag @var is not subtype of native type',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @var with type ',
        'contains' => ' is not subtype of native type ',
      ],
    ],
  ],
  'phpdocOverriddenPropertyNotCovariant' => [
    'message' => 'PHPDoc type of property is not covariant with PHPDoc type of overridden property',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc type ',
        'contains' => [' of property ', ' is not covariant with PHPDoc type ', ' of overridden property '],
      ],
    ],
  ],
  'unneededArrayValues' => [
    'message' => 'Parameter #1 of array_values is already a list, call has no effect.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Parameter \#1 \$array ',
        'ends_with' => ' of array_values is already a list, call has no effect\.$#',
      ],
    ],
  ],
  'unneededArrayFilter' => [
    'message' => 'Parameter #1 of array_filter does not contain falsy values, the array will always stay the same.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Parameter \#1 \$array ',
        'ends_with' => ' to function array_filter does not contain falsy values, the array will always stay the same\.$#',
      ],
    ],
  ],
  'propertyNeverRead' => [
    'message' => 'Property is never read, only written.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Property ',
        'ends_with' => ' is never read, only written\.$#',
      ],
    ],
  ],
  'propertyMissingType' => [
    'message' => 'Property has no type specified',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Property ',
        'ends_with' => ' has no type specified\.$#',
      ],
    ],
  ],
  'propertyIssetNotNullable' => [
    'message' => 'Property in isset is not nullable.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Property ',
        'ends_with' => ' in isset\(\) is not nullable\.$#',
      ],
    ],
  ],
  'readonlyPropertyAssignedOutsideConstructor' => [
    'message' => 'Readonly property is assigned outside of the constructor',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Readonly property ',
        'ends_with' => ' is assigned outside of the constructor\.$#',
      ],
    ],
  ],
  'voidResultUsedClosure' => [
    'message' => 'Result of closure (void) is used.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Result of closure \(void\) is used\.$#',
      ],
    ],
  ],
  'voidResultUsedMethod' => [
    'message' => 'Result of method (void) is used.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Result of method ',
        'ends_with' => ' \(void\) is used\.$#',
      ],
    ],
  ],
  'voidResultUsedStaticMethod' => [
    'message' => 'Result of static method (void) is used.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Result of static method ',
        'ends_with' => ' \(void\) is used\.$#',
      ],
    ],
  ],
  'returnTypeIncompatible' => [
    'message' => 'Return type of method should be compatible with parent return type',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Return type ',
        'contains' => [' should be compatible with return type ', ' of method '],
      ],
    ],
  ],
  'phpdocVariableDoesNotExist' => [
    'message' => 'Variable in PHPDoc tag @var does not exist.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Variable ',
        'ends_with' => ' in PHPDoc tag @var does not exist\.$#',
      ],
    ],
  ],
  'phpdocVariableDoesNotMatch' => [
    'message' => 'Variable in PHPDoc tag @var does not exist.',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^Variable ',
          'contains' => ' in PHPDoc tag @var does not match assigned variable ',
        ],
        [
          'starts_with' => '#^Variable ',
          'contains' => ' in PHPDoc tag @var does not match any variable in the foreach loop',
        ],
      ],
    ],
  ],
  'phpdocVariableGenericClass' => [
    'message' => 'PHPDoc tag @var for variable contains generic class but does not specify its types',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @var for variable ',
        'contains' => [' contains generic class ', ' but does not specify its types\:'],
      ],
    ],
  ],
  'phpdocVariableGenericInterface' => [
    'message' => 'PHPDoc tag @var for variable contains generic interface but does not specify its types',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @var for variable ',
        'contains' => [' contains generic interface ', ' but does not specify its types\:'],
      ],
    ],
  ],
  'phpdocVariableGenericIterable' => [
    'message' => 'PHPDoc tag @var for variable has no value type specified in iterable type.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @var for variable ',
        'contains' => ' has no value type specified in iterable type ',
      ],
    ],
  ],
  'phpdocVariableUnknownClass' => [
    'message' => 'PHPDoc tag @var for variable contains unknown class.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @var for variable ',
        'contains' => ' contains unknown class ',
      ],
    ],
  ],
  'methodOnlyExpectsVariable' => [
    'message' => 'Parameter of method is passed by reference, so it expects variables only.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Parameter ',
        'contains' => ' of method ',
        'ends_with' => ' is passed by reference, so it expects variables only\.$#',
      ],
    ],
  ],
  'staticMethodOnlyExpectsVariable' => [
    'message' => 'Parameter of static method is passed by reference, so it expects variables only.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Parameter ',
        'contains' => ' of static method ',
        'ends_with' => ' is passed by reference, so it expects variables only\.$#',
      ],
    ],
  ],
  'matchExpressionNonExhaustive' => [
    'message' => 'Match expression does not handle remaning value',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Match expression does not handle remaining value\:',
      ],
    ],
  ],
  'unsafePrivateMethodCall' => [
    'message' => 'Unsafe call to private method',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Unsafe call to private method ',
      ],
    ],
  ],
  'staticPropertyNotNullable' => [
    'message' => 'Static property in isset() is not nullable.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Static property ',
        'ends_with' => ' in isset\(\) is not nullable\.$#',
      ],
    ],
  ],
  'propertyNullCoalesceNotNullable' => [
    'message' => 'Property on left side of ?? is not nullable.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Property ',
        'ends_with' => ' on left side of \?\? is not nullable\.$#',
      ],
    ],
  ],
  'propertyInEmptyNotFalsy' => [
    'message' => 'Property in empty() is not falsy.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Property ',
        'ends_with' => ' in empty\(\) is not falsy\.$#',
      ],
    ],
  ],
  'staticPropertyInEmptyNotFalsy' => [
    'message' => 'Static property in empty() is not falsy.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Static property ',
        'ends_with' => ' in empty\(\) is not falsy\.$#',
      ],
    ],
  ],
  'parameterShouldBeCompatibleWith' => [
    'message' => 'Parameter should be compatible with parent class/interface parameter.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Parameter ',
        'contains' => [' of method ', ' should be compatible with parameter '],
      ],
    ],
  ],
  'parameterInvalidType' => [
    'message' => 'Parameter has invalid type',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Parameter ',
        'contains' => [' of method ', ' has invalid type '],
      ],
    ],
  ],
  'functionNeverReturnsType' => [
    'message' => 'Function never returns type so it can be removed from the return type.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Function ',
        'contains' => ' never returns ',
        'ends_with' => ' so it can be removed from the return type\.$#',
      ],
    ],
  ],
  'cannotUnsetOffsetOnArrayShape' => [
    'message' => 'Cannot unset offset on array shape.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Cannot unset offset ',
        'contains' => ' on array\{',
        'ends_with' => '\}\.$#',
      ],
    ],
  ],
  'arrayDestructuringOnMaybeType' => [
    'message' => 'Cannot use array destructuring on array|x.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Cannot use array destructuring on ',
      ],
    ],
  ],
  'expressionEmptyNotFalsy' => [
    'message' => 'Expression in empty() is not falsy',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Expression in empty\(\) is not falsy\.$#',
      ],
    ],
  ],
  'generatorExpectsGotMixed' => [
    'message' => 'Generator expects value type, mixed given',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Generator expects value type ',
        'ends_with' => ', mixed given\.$#',
      ],
    ],
  ],
  'invalidArrayKeyType' => [
    'message' => 'Invalid array key type',
    'count' => 0,
    'criteria' => [
      'message' => [
        [
          'starts_with' => '#^Invalid array key type ',
        ],
        [
          'starts_with' => '#^Possibly invalid array key type ',
        ],
      ],
    ],
  ],
  'invalidThrow' => [
    'message' => 'Invalid type to throw',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Invalid type ',
        'ends_with' => ' to throw\.$#',
      ],
    ],
  ],
  'looseComparisonAlwaysTrue' => [
    'message' => 'Loose comparison will always evaluate to true',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Loose comparison using ',
        'ends_with' => ' will always evaluate to true\.$#',
      ],
    ],
  ],
  'looseComparisonAlwaysFalse' => [
    'message' => 'Loose comparison will always evaluate to false',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Loose comparison using ',
        'ends_with' => ' will always evaluate to false\.$#',
      ],
    ],
  ],
  'offsetNullCoalesceNotFalsy' => [
    'message' => 'Offset on array on left side of ?? always exists and is not nullable.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Offset ',
        'ends_with' => ' on left side of \?\? always exists and is not nullable\.$#',
      ],
    ],
  ],
  'offsetEmptyNotFalsy' => [
    'message' => 'Offset on array in empty() always exists and is not falsy.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Offset ',
        'ends_with' => ' in empty\(\) always exists and is not falsy\.$#',
      ],
    ],
  ],
  'invalidUnpack' => [
    'message' => 'Only iterables can be unpacked',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Only iterables can be unpacked, ',
        'contains' => ' given',
      ],
    ],
  ],
  'phpdocParamIncompatibleType' => [
    'message' => 'PHPDoc tag @param for parameter is incompatible with native type',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @param for parameter ',
        'contains' => [' with type ', ' is incompatible with native type '],
      ],
    ],
  ],
  'phpdocThrowInvalidSubtype' => [
    'message' => 'PHPDoc tag @throw is not a subtype of Throwable',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @throws with type ',
        'ends_with' => ' is not subtype of Throwable$#',
      ],
    ],
  ],
  'phpdocVarPropertyInvalidSubtype' => [
    'message' => 'PHPDoc tag @var for property is not subtype of native type',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @var for property ',
        'contains' => ' is not subtype of native type ',
      ],
    ],
  ],
  'phpdocPromotedPropertyInvalidSubtype' => [
    'message' => 'PHPDoc type for property is not subtype of native type',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc type for property ',
        'contains' => [' with type ', ' is not subtype of native type '],
      ],
    ],
  ],
  'parameterUnresolvableType' => [
    'message' => 'Parameter  contains unresolvable type.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Parameter ',
        'ends_with' => ' contains unresolvable type\.$#',
      ],
    ],
  ],
  'functionOnlyExpectsVariable' => [
    'message' => 'Parameter of function is passed by reference, so it expects variables only.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Parameter ',
        'contains' => ' of function ',
        'ends_with' => ' is passed by reference, so it expects variables only\.$#',
      ],
    ],
  ],
  'functionParameterExpectsLowerNumber' => [
    'message' => 'Parameter #1 expects lower number than parameter #2',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Parameter \#1 ',
        'contains' => [' of function ', ' expects lower number than parameter \#2 '],
      ],
    ],
  ],
  'propertyUnused' => [
    'message' => 'Property is unused',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Property ',
        'ends_with' => ' is unused\.$#',
      ],
    ],
  ],
  'unusedTrait' => [
    'message' => 'Trait is used zero times and is not analysed.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Trait ',
        'ends_with' => ' is used zero times and is not analysed\.$#',
      ],
    ],
  ],
  'callableInvalid' => [
    'message' => 'Trying to invoke callable but it is not a callable.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Trying to invoke ',
        'ends_with' => "but it's not a callable\.$#",
      ],
    ],
  ],
  'callableMaybeInvalid' => [
    'message' => 'Trying to invoke callable but it might not be a callable.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Trying to invoke ',
        'contains' => 'callable',
        'ends_with' => 'but it might not be a callable\.$#',
      ],
    ],
  ],
  'mockUndefinedMethod' => [
    'message' => 'Trying to mock an undefined method on class',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Trying to mock an undefined method ',
        'contains' => ' on class ',
      ],
    ],
  ],
  'unableToResolveTemplateTypeMethod' => [
    'message' => 'Unable to resolve the template type in call to method.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Unable to resolve the template type ',
        'contains' => ' in call to method ',
      ],
    ],
  ],
  'unsafePrivateStaticAccessConstant' => [
    'message' => 'Unsafe access to private constant to through static',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Unsafe access to private constant ',
        'ends_with' => ' through static\:\:\.$#',
      ],
    ],
  ],
  'unsafePrivateStaticAccessProperty' => [
    'message' => 'Unsafe access to private property through static',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Unsafe access to private property ',
        'ends_with' => ' through static\:\:\.$#',
      ],
    ],
  ],
  'unusedTernaryResult' => [
    'message' => 'Unused result of ternary operator',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Unused result of ternary operator\.$#',
      ],
    ],
  ],
  'unneededNullsafe' => [
    'message' => 'Using nullsafe property access on left side of ?? is unneccessary. Use -> instead.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Using nullsafe property access ',
        'ends_with' => ' on left side of \?\? is unnecessary\. Use \-\> instead\.$#',
      ],
    ],
  ],
  'variableNullCoalesceNotNullable' => [
    'message' => 'Variable on left side of ?? always exists and is not nullable',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Variable ',
        'ends_with' => ' on left side of \?\? always exists and is not nullable\.$#',
      ],
    ],
  ],
  'invalidYield' => [
    'message' => 'Yield can be used only with these return types: Generator, Iterator, Traversable, iterable.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Yield can be used only with these return types\: Generator, Iterator, Traversable, iterable\.$#',
      ],
    ],
  ],
  'cannotClone' => [
    'message' => 'Cannot clone type',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Cannot clone ',
      ],
    ],
  ],
  'expressionNotNullable' => [
    'message' => 'Expression on left side of ?? is not nullable.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Expression on left side of \?\? is not nullable\.$#',
      ],
    ],
  ],
  'phpdocVarMissingName' => [
    'message' => 'PHPDoc tag @var does not specify variable name.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @var does not specify variable name\.$#',
      ],
    ],
  ],
  'phpdocVariableInvalidType' => [
    'message' => 'PHPDoc tag @var for variable has invalid type',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @var for variable ',
        'contains' => ' has invalid type ',
      ],
    ],
  ],
  'phpdocVarAboveMethodHasNoEffect' => [
    'message' => 'PHPDoc tag @var above a method has no effect.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^PHPDoc tag @var above a method has no effect\.$#',
      ],
    ],
  ],
  'missingCacheBackend' => [
    'message' => 'Missing cache backend declaration for performance.',
    'count' => 0,
    'criteria' => [
      'message' => [
        'starts_with' => '#^Missing cache backend declaration for performance\.$#',
      ],
    ],
  ],
];

// '' => [
//   'message' => '',
//   'count' => 0,
//   'criteria' => [
//     'message' => [
//       'starts_with' => '',
//       'contains' => '',
//       'ends_with' => '',
//     ],
//   ],
// ],

return $errorClassification;
