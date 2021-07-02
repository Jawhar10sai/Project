USE [RAMEX]
GO

/****** Object:  Table [dbo].[Operateur]    Script Date: 28/12/2020 10:53:58 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Operateur](
	[id] [int] NOT NULL,
	[operateur] [varchar](50) NULL,
	[libelle] [varchar](50) NULL,
	[prefixe] [varchar](50) NULL,
	[suffixe] [varchar](50) NULL,
 CONSTRAINT [PK_Operateur] PRIMARY KEY CLUSTERED
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
