# API
> 测试地址 106.12.19.27:9999

## 目录
- [通信数据基础结构](#basic-data)
- [状态码](#status-code)
- [公司相关接口](#company)
    - [获取公司编辑信息](#company-get-admin-info)
    - [设置公司信息](#company-set-info)
    - [获取公司展示信息](#company-get-info)
    - [获取公司历史编辑信息](#company-history-get-admin-list)
    - [设置公司历史信息](#company-history-set)
    - [删除公司历史信息](#company-history-del)
    - [获取公司历史展示信息](#company-history-get)
    - [获取公司新闻编辑信息](#company-news-get-admin-list)
    - [设置公司新闻信息](#company-news-set)
    - [删除公司新闻信息](#company-news-del)
    - [获取公司新闻展示信息](#company-news-get-list)
- [用户反馈相关接口](#feedback)
    - [提交反馈](#feedback-submit)
    - [后台反馈列表](#feedback-admin-list)
- [产品相关接口](#product)
    - [产品分类列表](#product-category-list)
- [导航栏相关接口](#nav)
    - [菜单栏](#nav-menus)
- [图片相关接口](#image)
    - [上传图片](#image-upload)

<div id="basic-data"></div>

## 通信数据基础结构
### Request
| 参数 | 方式 | 说明 |
| --- | --- | --- |
| language | header | 语言，不传则服务器默认 "cn" |

### Response
| 参数 | 类型 | 说明 |
| --- | --- | --- |
| code | int | 1 成功，0 失败 |
| msg | string | 错误信息等 |
| data | json | 对应的数据内容 |

<div id="i18n"></div>

### 多语言字段结构 （i18n）
| 参数 | 类型 | 说明 |
| --- | --- | --- |
| cn | string | 中文 |
| en | string | 英文 |

<div id="status-code"></div>

## 状态码
| 编号 | 说明 |
| --- | --- |
| 0 | 失败 |
| 1 | 成功 |

<div id="company"></div>

## 公司相关接口

<div id="company-get-admin-info"></div>

### 获取公司编辑信息
#### 接口标识
请求方式：HTTP GET  
接口名称：/admin/company/getInfo  
参数类型：无

#### 返回参数
| 参数名 | 类型 | 描述 |
| --- | --- | --- |
| phone | string | 电话 |
| fax | string | 传真 |
| mobilePhone | string | 手机号 |
| concatUser | [i18n](#i18n) | 联系人 |
| email | string | 邮箱 |
| address | [i18n](#i18n) | 地址 |
| logo | string | 公司 logo |
| briefIntroduction | [i18n](#i18n) | 公司介绍 |
| latLng | map | 经纬度 |
| latLng.lat | float | 维度 |
| latLng.lng | float | 经度 |

```json
{
    "code": 1,
    "msg": "",
    "data": {
        "phone": "12345678901",
        "fax": "12345678901",
        "mobilePhone": "12345678901",
        "concatUser": {
            "cn": "灿灿",
            "en": "cancan"
        },
        "email": "1048042379@qq.com",
        "address": {
            "cn": "杭州",
            "en": "HangZhou"
        },
        "logo": "xxxx",
        "briefIntroduction": {
            "cn": "行货组水电费水电费第三方第三方撒范德萨发顺丰",
            "en": "dfsdfsdfsdfsdfsdferewg wefwedsfsdfwe fefewfdsad fewfwe"
        },
        "latLng": {
            "lat": 111.01,
            "lng": 222.01
        }
    }
}
```

<div id="company-set-info"></div>

### 设置公司信息
#### 接口标识
请求方式：HTTP POST  
接口名称：/admin/company/setInfo  
参数类型：application/json

#### 请求参数
| 参数名 | 类型 | 必传 | 示例 | 描述 |
| --- | --- | --- | --- | --- |
| phone | string | true | "110" | 电话 |
| fax | string | true | "119" | 传真 |
| mobilePhone | string | true | "120" | 手机号 |
| concatUser | [i18n](#i18n) | true | {"cn": "灿灿"} | 联系人 |
| email | string | true | "xxx@qq.com" | 邮箱 |
| address | [i18n](#i18n) | true | {"cn": "杭州"} | 地址 |
| logo | string | true | "<http://xxxx.jpg>" | 公司 logo |
| briefIntroduction | [i18n](#i18n) | true | {"cn": "xxx"} | 公司介绍 |
| latLng | map | true | {"lat": 111.01, "lng": 222.02} | 经纬度 |
| latLng.lat | float | true | 111.01 | 维度 |
| latLng.lng | float | true | 222.02 | 经度 |

#### 返回参数
```json
{
    "code": 1,
    "msg": "",
    "data": null
}
```
<div id="company-get-info"></div>

### 获取公司展示信息
#### 接口标识
请求方式：HTTP GET  
接口名称：/v1/company/info  
参数类型: 无

#### 返回参数
| 参数名 | 类型 | 描述 |
| --- | --- | --- |
| phone | string | 电话 |
| fax | string | 传真 |
| mobilePhone | string | 手机号 |
| concatUser | string | 联系人 |
| email | string | 邮箱 |
| address | string | 地址 |
| logo | string | 公司 logo |
| briefIntroduction | string | 公司介绍 |
| latLng | map | 经纬度 |
| latLng.lat | float | 维度 |
| latLng.lng | float | 经度 |

```json
{
    "code": 1,
    "msg": "",
    "data": {
        "phone": "12345678901",
        "fax": "12345678901",
        "mobilePhone": "12345678901",
        "concatUser": "cancan",
        "email": "1048042379@qq.com",
        "address": "杭州",
        "logo": "xxxx",
        "BriefIntroduction": "行货组水电费水电费第三方第三方撒范德萨发顺丰",
        "latLng": {
            "lat": 111.01,
            "lng": 222.01
        }
    }
}
```

<div id="company-history-get-admin-list"></div>

### 获取公司历史编辑信息
#### 接口标识
请求方式：HTTP GET  
接口名称：/admin/company/history/list  
参数类型：无

#### 返回参数
| 参数名 | 类型 | 描述 |
| --- | --- | --- |
| timestamp | int | 时间戳 |
| content | [i18n](#i18n) | 内容 |

```json
{
    "code": 1,
    "msg": "",
    "data": [
        {
            "timestamp": 1568551589,
            "content": {
                "cn": "aaaa",
                "en": "bbbb"
            }
        }
    ]
}
```

<div id="company-history-set"></div>

### 设置公司历史信息
#### 接口标识
请求方式：HTTP POST  
接口名称：/admin/company/history/set  
参数类型：application/json

#### 请求参数
| 参数名 | 类型 | 必传 | 示例 | 描述 |
| --- | --- | --- | --- | --- |
| timestamp | int | true | 1568551589 | 时间戳 |
| content | [i18n](#i18n) | true | {"cn": "aa"} |  内容 |

#### 返回参数
```json
{
    "code": 1,
    "msg": "",
    "data": null
}
```

<div id="company-history-del"></div>

### 删除公司历史编辑信息
#### 接口标识
请求方式：HTTP POST  
接口名称：/admin/company/history/del  
参数类型：无

#### 返回参数
| 参数名 | 类型 | 描述 |
| --- | --- | --- |
| timestamp | int | 时间戳 |

#### 返回参数
```json
{
    "code": 1,
    "msg": "",
    "data": null
}
```

<div id="company-history-get"></div>

### 获取公司历史展示信息
#### 接口标识
请求方式：HTTP GET  
接口名称：/v1/company/history/list  
参数类型：无

#### 返回参数
| 参数名 | 类型 | 描述 |
| --- | --- | --- |
| timestamp | int | 时间戳 |
| content | string | 内容 |

```json
{
    "code": 1,
    "msg": "",
    "data": [
        {
            "timestamp": 1568551589,
            "content": "aaaa"
        }
    ]
}
```

<div id="company-news-get-admin-list"></div>

### 获取公司新闻编辑信息
#### 接口标识
请求方式：HTTP GET  
接口名称：/admin/company/news/list  
参数类型：无

#### 返回参数
| 参数名 | 类型 | 描述 |
| --- | --- | --- |
| id | int | 唯一标识 |
| title | [i18n](#i18n) | 标题 |
| content | [i18n](#i18n) | 内容 |
| img | string | 图片 |
| time | int | 新闻时间戳 |
| setTime | int | 新闻设置时间 |

```json
{
    "code": 1,
    "msg": "",
    "data": [
        {
            "id": 1,
            "title": {
                "cn": "测试2",
                "en": "test2"
            },
            "content": {
                "cn": "啊啊啊啊2",
                "en": "aaaa2"
            },
            "img": "xxxxxx",
            "time": 1568734342,
            "setTime": 1568734342
        }
    ]
}
```


<div id="company-news-set"></div>

### 设置公司新闻信息
#### 接口标识
请求方式：HTTP POST  
接口名称：/admin/company/news/set  
参数类型：application/json

#### 请求参数
| 参数名 | 类型 | 必传 | 示例 | 描述 |
| --- | --- | --- | --- | --- |
| id | int | false | 1 | 唯一标识，0 新增，非 0 则修改 |
| title | [i18n](#i18n) | true | {"cn": "aa"} | 标题 |
| content | [i18n](#i18n) | true | {"cn": "aa"} |  内容 |
| img | string | true | "<http://xxx.jpg>" |  图片地址 |
| time | int | true | 1568734342 | 新闻时间戳 |

#### 返回参数
```json
{
    "code": 1,
    "msg": "",
    "data": null
}
```

<div id="company-news-del"></div>

### 删除公司新闻信息
#### 接口标识
请求方式：HTTP POST  
接口名称：/admin/company/news/del  
参数类型：application/json

#### 请求参数
| 参数名 | 类型 | 必传 | 示例 | 描述 |
| --- | --- | --- | --- | --- |
| id | int | false | 1 | 唯一标识 |

#### 返回参数
```json
{
    "code": 1,
    "msg": "",
    "data": null
}
```

<div id="company-news-get-list"></div>

### 获取公司新闻展示信息
#### 接口标识
请求方式：HTTP GET  
接口名称：/v1/company/history/list  
参数类型：无

#### 返回参数
| 参数名 | 类型 | 描述 |
| --- | --- | --- |
| id | int | 唯一标识 |
| title | string | 标题 |
| content | string | 内容 |
| img | string | 图片 |
| time | int | 新闻时间戳 |

```json
{
    "code": 1,
    "msg": "",
    "data": [
        {
            "id": 1,
            "img": "xxxxxx",
            "title": "测试2",
            "content": "啊啊啊啊2",
            "time": 1568734342
        }
    ]
}
```

<div id="feedback"></div>

## 用户反馈相关接口

<div id="feedback-submit"></div>

### 提交反馈
#### 接口标识
请求方式：HTTP POST  
接口名称：/v1/feedback/submit  
参数类型：application/json

#### 请求参数
| 参数名 | 类型 | 必传 | 示例 | 描述 |
| --- | --- | --- | --- | --- |
| name | string | true | "cancan" | 姓名 |
| company | string | true | "tianji" | 公司 |
| phone | string | true | "13738101971" | 电话 |
| email | string | true | "1048042379@qq.com" | 邮箱 |
| content | string | true | "233"  | 内容 |

#### 返回参数
```json
{
    "code": 1,
    "msg": "",
    "data": null
}
```

<div id="feedback-admin-list"></div>

### 后台反馈列表
#### 接口标识
请求方式：HTTP GET  
接口名称：/admin/feedback/list  
参数类型：无

#### 返回参数
| 参数名 | 类型 | 描述 |
| --- | --- | --- |
| id | int | 唯一标识 |
| name | string | 姓名 |
| company | string | 公司 |
| phone | string | 手机 |
| email | string | 邮箱 |
| content | string | 内容 |
| time | int | 反馈时间 |

```json
{
    "code": 1,
    "msg": "",
    "data": [
        {
            "id": 1,
            "name": "cancan",
            "company": "tianji",
            "phone": "13738101971",
            "email": "10480482379@qq.com",
            "content": "23333 哈哈哈哈哈哈",
            "time": 1568908071
        }
    ]
}
```

<div id="product"></div>

## 产品相关接口

<div id="product-category-list"></div>

### 产品分类列表
#### 接口标识
请求方式：HTTP GET  
接口名称：/v1/product/category/list  
参数类型：无

#### 返回参数
| 参数名 | 类型 | 描述 |
| --- | --- | --- |
| id | int | 唯一标识 |
| label | string | 名称 |
| child | array | 子分类 |

```json
{
    "code": 1,
    "msg": "",
    "data": [
        {
            "id": 1,
            "label": "金属纽系列",
            "child": [
                {
                    "id": 8,
                    "label": "工字扣",
                    "child": []
                },
                {
                    "id": 9,
                    "label": "铆钉",
                    "child": []
                }
            ]
        }
    ]
}
```
<div id="nav"></div>

## 导航栏相关接口

<div id="nav-menus"></div>

### 菜单栏
#### 接口标识
请求方式：HTTP GET  
接口名称：/v1/nav/menus/list  
参数类型：无

#### 返回参数
| 参数名 | 类型 | 描述 |
| --- | --- | --- |
| name  | string | 名称 |
| state  | string | 路由 |
| id  | int | 编号 |
| pid | int | 子编号 |

```json
{
    "code": 1,
    "msg": "",
    "data": [
        {
            "name": "menus.home",
            "state": "/app/home",
            "id": 7,
            "pid": -1
        },
        {
            "name": "menus.aboutUs",
            "id": 1,
            "pid": -1
        }
    ]
}
```

<div id="image"></div>

## 图片相关接口

<div id="image-upload"></div>

### 上传图片
#### 接口标识
请求方式：HTTP POST  
接口名称：/admin/image/upload  
参数类型：form-data

#### 请求参数
| 参数名 | 类型 | 必传 | 示例 | 描述 |
| --- | --- | --- | --- | --- |
| uploadFile | file | true | "xxx.jpg" | 上传图片文件，大小限制 5MB |
| dir | string | true | "1" | 目录，"1"="/logo","2"="/product" |

#### 返回参数
| 参数名 | 类型 | 示例 | 描述 |
| --- | --- | --- | --- |
| url | string | "/statics/logo/xxx.jpg" | 图片地址 |

```json
{
    "code": 1,
    "msg": "",
    "data": {
        "url": "/statics/logo/3c8f0faa6aa89664a00729428196ab05.jpg"
    }
}
```
